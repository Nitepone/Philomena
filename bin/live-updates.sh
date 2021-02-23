#! /bin/bash
#
# live-updates.sh
# Copyright (C) 2021 nitepone <admin@night.horse>
#
# Distributed under terms of the MIT license.
#

HTTP_ROOT="/var/www/html"

shopt -s extglob
set -eo pipefail


function deploy_head {
	cp -r !(.git*|README.md) "$HTTP_ROOT"
}

function git_forward {
	local branch
	local old_hash
	branch=$1

	old_hash="$(git rev-parse HEAD)"
	git fetch -a
	git checkout "origin/$branch" &> /dev/null
	git submodule update --init --recursive &> /dev/null
	if [[ "$(git rev-parse HEAD)" != "$old_hash" ]]; then
		deploy_head
		return 0
	fi
	return 1
}

if [[ -z $1 ]]; then
	echo "USAGE: ./live-updates.sh [branch_name]"
	exit 1
fi

# ensure we are on target branch
git fetch -a
git checkout "origin/$1"
git submodule update --init --recursive

# deploy current
deploy_head

# enter update loop
while :; do
	if git_forward $1 ; then
		echo "Site Updated at: $(date +'%Y-%m-%d, %H:%M:%S')"
	fi
	sleep 4
done
