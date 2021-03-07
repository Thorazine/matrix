# Intro
Thanks for the oppertunity. The job seems like a real nice challenge and working with Laravel always makes me happy.


## Project
It was a nice project to do. But to be honest, I'm not math wizard. Had some difficulties with the conversions on my own. So to save time I looked it up and found some beauties. I figured the project wasn't about finding the calculation on your own, but about how one setups up the structure.

I did run into a problem; I could not figure out what you meant with column and row validation. So basically I built a calculator instead. I'll be happy to change some code around to comply with the assignment after some explaining.


## Thought process
1. If there is a multiplication of letters, then it's not hard to imagine that a future request will come for subtration or other types of calculations. So with a tiny bit of added work the controller is now extendible with more basic functions.

2. If a calculation of two numbers is requested, it's not hard to imagine more numbers will need multiplication in the future. So I just did an array multiplication for exdendibility sake as it is little work. Future programmers can extend the test to cover [x] more calculations and the validation rules need adjustment to allow more variables. Everything else works automagically out of the box.


## Running the test
```
php artisan test
```