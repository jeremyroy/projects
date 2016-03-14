/*
* Header file for JumblePuzzle class.
* Author: Jeremy Roy
* NetId: 12jfr2
*/

#include <string>
#pragma once

using namespace std;

enum Dificulty {EASY, MEDIUM, HARD};
typedef char* charArrayPtr;

class JumblePuzzle{
public:
	JumblePuzzle(const string, const string);
	JumblePuzzle(JumblePuzzle&);
	~JumblePuzzle();
	JumblePuzzle& operator=(const JumblePuzzle&);
	//mutators
	void setNewDifficulty(string);
	void setNewWord(const string);
	//accessors
	int getSize() const;
	int getColPos() const;
	int getRowPos() const;
	char getDirection() const;
	charArrayPtr* getJumble() const;
private:
	//mutators
	void setDifficulty(string, const string);
	void setWord(string);
	void setPosition();
	void setDirection();
	//other functions
	void createJumble();
	void jumbleInit();
	int hideWord();
	charArrayPtr* cloneJumble(const charArrayPtr*) const;
	//attributes
	Dificulty difficulty;
	string hiddenWord;
	int wordSize;
	int jumbleSize;
	int colPos;
	int rowPos;
	char direction;
	charArrayPtr* jumble;
};

class BadJumbleException{
public:
	BadJumbleException(const string& message);
	string& what();
private:
	string message;
};

void stringToLowerCase(string& str);
int isAlphabetic(const string str);