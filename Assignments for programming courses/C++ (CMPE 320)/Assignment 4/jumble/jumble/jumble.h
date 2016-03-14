#include <string>
#pragma once

using namespace std;

enum Dificulty {EASY, MEDIUM, HARD};

class JumblePuzzle{
public:
	JumblePuzzle(const string, const string);

private:
	Dificulty difficulty;
	string* toHide;
};