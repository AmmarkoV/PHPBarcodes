#!/bin/bash

#./barcodes.sh "test" 1000 "XII%07d" "3x7+5+15" "10,5"
#$1 is the filename of the barcode file
#$2 is the start number of barcodes
#$3 is the end_number of barcodes
#$4 is the formatting of the barcode , i.e. "XII%07d"
#$5 is the dimensions argument , i.e. "3x7+5+15"
#$6 is the internal padding argument , i.e. "10,5"

if [ -e "barcodes/$1.txt" ]
then 
rm  "barcodes/$1.txt"
fi

for i in $(seq $2 $3)
do   
   echo `printf "$4" $i` >> "barcodes/$1.txt" 
done


cat "barcodes/$1.txt" | barcode -u mm -t $5 -m $6 -o "barcodes/$1.ps" 

exit 0
