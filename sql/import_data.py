#!/usr/bin/python

import sys

file_name = "lifts.csv"
output_file_name = "insert_statements.sql"

output_file = open(output_file_name, "wr")

with open(file_name) as f:
  for line in f:
    if len(line) > 1:
      line_list = line.strip("\n").split(",")
      insert_string = "INSERT INTO lifs(name,  description) VALUES (%s, %s);" % (line_list[0], line_list[1])
      print insert_string
      output_file.write(insert_string+"\n")
