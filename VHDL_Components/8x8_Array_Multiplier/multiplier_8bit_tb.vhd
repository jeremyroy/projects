-- TestBench for a 32-bit multiplier_tb
--	Author: Jeremy Roy

library ieee;
use ieee.std_logic_1164.all;
use ieee.std_logic_unsigned.all;

ENTITY	multiplier_8bit_tb	IS
END;

ARCHITECTURE tests_multiplier_8bit_tb of multiplier_8bit_tb IS
	signal	dataa_tb, datab_tb	:	std_logic_vector(7 downto 0);
	signal	output_tb				:	std_logic_vector(15 downto 0);
	Component array_mult8x8
		port(
			dataa, datab			:	IN 	std_logic_vector(7 downto 0);
			result					:	OUT	std_logic_vector(15 downto 0)
		);
	end component;
	
BEGIN
DUT		:	array_mult8x8
	port map(
		dataa 	=> dataa_tb,
		datab		=>	datab_tb,
		result	=>	output_tb);
		
	--test logic:
	sim_process	:	process
	begin
			wait for 0ns;
		dataa_tb	<=	x"FF";
		datab_tb	<=	x"FF";
			wait for 20ns;
		dataa_tb <=	x"78";
		datab_tb	<=	x"21";
			wait for 20ns;
		dataa_tb	<=	x"21";
		datab_tb	<=	x"78";
			wait for 20ns;
	end process sim_process;
END ARCHITECTURE;