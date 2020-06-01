#!/usr/bin/env bash

HUGOVERSION=0.72.0
HUGOARCHITECTURE=$(uname -m)
HUGOPLATFORM=$(uname -s)

if [ $HUGOPLATFORM = "Darwin" ]; then
	HUGOPLATFORM=macOS
elif [ $HUGOPLATFORM = "Linux" ]; then
	HUGOPLATFORM=Linux
elif [ $HUGOPLATFORM = "FreeBSD" ]; then
	HUGOPLATFORM=Linux
else
	echo "Unsupported OS"
fi

if [ $HUGOARCHITECTURE = "x86_64" ]; then
  HUGOARCHITECTURE=64bit
else
  HUGOARCHITECTURE=32bit
fi

# TODO: Handle ARM

URL="https://github.com/gohugoio/hugo/releases/download/v$HUGOVERSION/hugo_${HUGOVERSION}_${HUGOPLATFORM}-${HUGOARCHITECTURE}.tar.gz"

rm -r ./.hugo
mkdir ./.hugo

if [ "$NOW" = "1" ]; then
	curl -s -L -o ./.hugo/hugo.tar.gz -O $URL
else
	curl -L -o ./.hugo/hugo.tar.gz -O $URL
fi

pushd .hugo

tar -xzf ./hugo.tar.gz
rm -r ./hugo.tar.gz

popd
