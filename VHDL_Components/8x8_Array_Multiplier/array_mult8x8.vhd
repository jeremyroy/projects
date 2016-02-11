library ieee;
use ieee.std_logic_1164.all;

entity array_mult8x8 is
	port(
		dataa, datab	:	in std_logic_vector(7 downto 0);
		result	:	out std_logic_vector(15 downto 0)
	);
end entity;

architecture behavioral_arrayMult of array_mult8x8 is
	type pp_array is array (8 downto 0) of std_logic_vector(7 downto 0);
	type carry_array is array (7 downto 0) of std_logic_vector(8 downto 0);
	signal pp		:	pp_array;
	signal carry	:	carry_array;
	signal p			:	std_logic_vector(7 downto 0);
	
	Component multCell is
		PORT(
			carry_in, ppi_in, m_j, q_i	:	in std_logic;
			carry_out, ppi_out	:	out std_logic
		);
	end component;
begin	
	pp(0)	<=	x"00";
	
		GEN_CELL_ROW: for row in 0 to 7 generate --loop through rows
		
			GEN_CELL_COL: for col in 0 to 7 generate --loop through columns and generate cells
			begin
			
				FIRST_COL: if	col=0 generate
				begin
					multCellX	:	multCell	port map
						('0', pp(row)(col), dataa(col), datab(row), carry(row)(col+1), p(row));
				end generate FIRST_COL;
				
				MIDDLE_COLS: if (col>0) and (col<7) generate
				begin
					multCellX	:	multCell	port map
						(carry(row)(col), pp(row)(col), dataa(col), datab(row), carry(row)(col+1), pp(row+1)(col-1));
				end generate MIDDLE_COLS;
				
				LAST_COL: if (col=7) generate
				begin
					multCellX	:	multCell port map
						(carry(row)(col), pp(row)(col), dataa(col), datab(row), pp(row+1)(col), pp(row+1)(col-1));
				end generate LAST_COL;
				
			end generate GEN_CELL_COL;
			
		end generate GEN_CELL_ROW;
		
		--result(15)	<= carry(7)(8);
		--result(14 downto 7) <= pp(8);
		result <= pp(8) & p(7 downto 0);
	
	--for loop to instantiate array mult stages
end architecture;