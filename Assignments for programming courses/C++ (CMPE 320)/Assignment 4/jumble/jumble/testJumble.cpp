/*
* A testing class for your JumblePuzzle class and its exception. A few unit
* tests are provided but you will need to add a few more.
* The code also contains a simple function that allows you to play the game, and
* another function that you can use to display the puzzle.  You should not need to
* alter either of these supplied functions unless you wish to enhance them without
* changing the way JumblePuzzle operates.
*
* If you wish to build a GUI interface for the puzzle, you may certainly do so, as
* long as the unit tests are still carried out.
*/
#include <string>
#include <iostream>
#include <ctime>
#include "jumble.h"
#include "stdafx.h"
using namespace std;

// Displays the puzzle to the screen.
// Row and column numbers are added to the display.
/*void showJumble(const charArrayPtr* jumble, const int size) {
	int i, j;
	cout << "\n  ";
	for (i = 0; i < size; i++)
	if (i < 10)
		cout << " " << i << " ";
	else
		cout << i << " ";
	cout << endl;
	for (i = 0; i < size; i++) {
		if (i < 10)
			cout << " " << i << " ";
		else
			cout << i << " ";
		for (j = 0; j < size; j++)
			cout << jumble[i][j] << "  ";
		cout << endl;
	}
	cout << endl;
} // end showJumble

// How quickly can you find the hidden string?
void playGame() {
	string toHide;
	string difficulty;
	int guessRow, guessCol;
	int start, finish;
	char guessDirection;

	cout << "Provide a string to hide in the puzzle, all lower case: ";
	cin >> toHide;
	cout << "\nChoose your difficulty level: \"easy\", \"medium\" or \"hard\": ";
	cin >> difficulty;

	JumblePuzzle* jp;
	try {
		jp = new JumblePuzzle(toHide, difficulty);
	}
	catch (BadJumbleException& e) {
		cerr << e.what();
		return;
	}
	showJumble(jp->getJumble(), jp->getSize());
	start = static_cast<int>(time(NULL));
	cout << "Enter row location: ";
	cin >> guessRow;
	cout << "Enter column location: ";
	cin >> guessCol;
	cout << "Enter direction (\"n\", \"e\", \"s\" or \"w\"): ";
	cin >> guessDirection;
	finish = static_cast<int>(time(NULL));
	if (guessRow == jp->getRowPos() && guessCol == jp->getColPos() &&
		guessDirection == jp->getDirection())
		cout << "You found it!" << endl;
	else {
		cout << "Wrong location..." << endl;
		cout << "The location is row: " << jp->getRowPos() << " col: " << jp->getColPos()
			<< ", direction: " << jp->getDirection() << endl;
	}
	cout << "You took " << (finish - start) << " seconds." << endl;
	delete jp;
	jp = NULL;
} // end playGame

// Add unit tests to this function.  A few unit tests are provided to test your copy constructor,
// your assignment overloading and aliasing.  You need to write some more tests before these ones.
// Test the public members only ("Black Box Testing").  Test to make sure that exceptions are
// thrown when they should be, that the puzzle is the correct size and is formed properly, and
// that the accessors return what they should.  You can add these unit tests as you develop your
// code ("TDD") and comment out the supplied tests until you are ready for them.
void testJumble() {

	// Test copy constructor for proper operation
	cout << "Testing copy constructor:" << endl;
	// While debugging, you can use capital letters to make the hidden string easier to locate
	JumblePuzzle jp1("HELLO", "easy");
	showJumble(jp1.getJumble(), jp1.getSize());
	JumblePuzzle jp2(jp1);
	cout << "Should look the same:" << endl;
	showJumble(jp2.getJumble(), jp2.getSize());

	// Test aliasing from copy constructor
	charArrayPtr* puzzle = jp2.getJumble();
	int sz = jp2.getSize();
	for (int i = 0; i < sz; i++)
		puzzle[i][i] = '.';
	cout << "Dotted diagonal:" << endl;
	showJumble(puzzle, sz);
	cout << "Should be same as original 1:" << endl;
	showJumble(jp1.getJumble(), sz);
	cout << "Should be same as original 2:" << endl;
	showJumble(jp2.getJumble(), sz);

	// Test assignment operator for proper operation
	cout << "Testing assignment operator:" << endl;
	JumblePuzzle jp3("BYE", "easy");
	showJumble(jp3.getJumble(), jp3.getSize());
	JumblePuzzle jp4 = jp3;
	cout << "Should look the same:" << endl;
	showJumble(jp4.getJumble(), jp4.getSize());

	// Test aliasing from assignment operator
	puzzle = jp4.getJumble();
	sz = jp4.getSize();
	for (int i = 0; i < sz; i++)
		puzzle[i][i] = '*';
	cout << "Star diagonal:" << endl;
	showJumble(puzzle, sz);
	cout << "Should be same as original 3:" << endl;
	showJumble(jp3.getJumble(), sz);
	cout << "Should be same as original 4:" << endl;
	showJumble(jp4.getJumble(), sz);

	// Test self-assignment
	// This shows as a "bug", which it should do.  However, you should still
	// be able to build and run your program.
	jp4 = jp4;
	cout << "Should be same as original 4:" << endl;
	showJumble(jp4.getJumble(), sz);

	// Test for a memory leak.
	// This is a pretty slow test and it may be that the limit of the loop
	// will not be large enough to show a memory leak, especially if you have
	// quite a bit of RAM.  In my tests I found that with about 4.0 GB free this
	// test would cause a memory leak failure when loop Limit was 1,000,000.
	// Start with a loop limit of 100 or 1000 and increase it by a factor of 10.
	// The other way to see a memory leak failure is to have task manager show your
	// memory consumption as the program runs.  If it keeps climbing - you have a problem,
	// even if you don't run out of memory.
	// Of course you won't get a memory leak error if you are using the heap properly,
	// and the program will terminate normally!
	int loopLimit = 1000;
	for (int i = 0; i < loopLimit; i++)
		JumblePuzzle jp("HIDDENWORD", "hard");
	cout << "\nPassed memory leak test!" << endl;

} // end testJumble*/

string stringToLowerCase(string str){
	string newStr = "";
	for (std::string::size_type i = 0; i<str.length(); ++i)
	if (isupper(str[i]))
		newStr += tolower(str[i]);
}

int main() {

	//testJumble();

	string test = "UppERS";
	test = stringToLowerCase(test);
	cout << test << endl;

	// Make sure your class works before you play the game!
	//playGame();

	return 0;
} // end main

