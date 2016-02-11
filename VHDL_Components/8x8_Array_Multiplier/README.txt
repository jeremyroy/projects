I made an 8x8 array multiplier for a part of my Digital Systems Engineering 
course project.

Whereas other people struggled with for loops in VHDL and decided to simply
manually create the connections between all 64 cells, I decided to percevere
and figure out the nitty-gritty for-generate and if-generate constructs. This
way I can easily expand my multiplier to variable sizes.  A possible improvement
could be using constants as vector sizing delimiters (instead of manually inputing
them each time).  That way it would be even easier to modify the dimentions of the
multiplier.

In the end, I have a working 8x8 array multiplier.  I'm super proud about it.
You can download the files and test the multiplier with the included testbench.
