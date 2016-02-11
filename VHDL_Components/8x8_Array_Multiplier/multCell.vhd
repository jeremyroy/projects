library ieee;
use ieee.std_logic_1164.all;

entity multCell is
	port(
		carry_in, ppi_in, m_j, q_i	:	in std_logic;
		carry_out, ppi_out	:	out std_logic
	);
end entity;

architecture behavioral_multCell of multCell is
signal andResult	:	std_logic;
begin	
	andResult	<=	m_j and q_i;
	carry_out <= (carry_in and ppi_in) or (carry_in and andResult) or (ppi_in and andResult);
	ppi_out <= carry_in xor ppi_in xor andResult;
end architecture;