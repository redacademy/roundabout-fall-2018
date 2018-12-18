#!/bin/bash
# if do not work install svgexport (npm install svgexport -g)
# you can specify desired resolution as a command parameters

export WIDTH=${1:-400}
export HEIGHT=${2:-400}

echo  "🦄  will normalize all *.svg files to ${WIDTH}x${HEIGHT}"
for file in $(ls *.svg); do
    svgexport $file "${file%.*}-${WIDTH}x${HEIGHT}.png" pad ${WIDTH}:${HEIGHT}
done;