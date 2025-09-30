# PHP_LABS

## Overview
Collection of PHP lab exercises organized by lab number. Each lab includes source files, assets, and in many cases an accompanying PDF describing the assignment.

## Getting Started
- **Requirements**: PHP 7.4+ (or PHP 8.x) and a local web server (e.g., built-in PHP server).
- **Quick run**: From the repo root, you can serve any lab directory:
  - Windows PowerShell: `php -S localhost:8000 -t lab1`
  - Replace `lab1` with any lab folder to serve its files.

## Folder Structure

- `lab1/`
  - Exercises: `ex1.php`, `ex2.php`, `ex3_v1.html`, `ex3_v1.php`, `ex3_v2.php`, `ex3_v3.php`, `guess.php`
  - Reference: `Lab1 - I3302E.pdf`
  - Description: Fundamentals—loops and tables, currency converter, and a number guessing game.

- `lab2/`
  - Exercises: `ex1.php`, `ex2.php`
  - Reference: `Lab2 - I3302E.pdf`
  - Description: String/array processing (email domain counts) and simple credential validation rules.

- `lab3/`
  - Entry points: `index.php`, `see.php`
  - Data/assets: `messages.txt`, `logo.jpeg`
  - Reference: `Lab3 - I3302E.pdf`
  - Description: File-backed guestbook—write messages and read them behind a basic username/password gate.

- `lab4/`
  - Upload/view flow: `upload.php`, `save.php`, `view.php`
  - Data: `photos.txt`
  - Assets: `flowers/` images
  - Reference: `Lab4 - I3302E.pdf`
  - Description: Image gallery with upload (type/size checks) and prev/next navigation persisted to a text index.

- `lab5V2/`
  - Shop/cart demo: `list.php`, `view.php`, `cart.php`
  - Product images grouped by category: `netbook/`, `portable/`, `ultraportable/`
  - Reference: `--Lab6 - I3302E - Midterm - 2018-2019.pdf`
  - Description: Mini catalog—list products from filenames, view details, add to cart, and edit quantities via session.

- `lab7/`
  - QCM/Evaluation: `QCM.php`, `eval.php`, `res.php`, `Answers.txt`, `questions.txt`
  - Reference: `--Lab7 - I3302E - Partiel - 2013-2014.pdf`
  - Description: Multiple-choice quiz loaded from files; evaluates selections and marks correct/wrong answers.

- `lab8/`
  - Auth/profile flow: `connect.html`, `connect.php`, `profile.php`, `change.php`, `save.php`, `functions.php`
  - Data/assets: `users.txt`, `pics/`
  - Sub-exercises: `lab8_2/` (similar flow with its own `users.txt`, `pics/`, and pages)
  - Reference: `--Lab8 - I3302E - Partiel - 2014-2015.pdf`
  - Description: Simple authentication using `users.txt`, profile display with photo/status, and profile update actions.

- `Lab9/`
  - Voting exercise: `starac.php`, `candidats.php`, `functions.php`, `voters.txt`
  - Reference: `--Lab9 - I3302E - Partiel - 2009-2010.pdf`
  - Description: Voting app—submit a vote, persist tallies in `voters.txt`, and show the current leading candidate.

## Notes
- Static `.txt` files (e.g., `messages.txt`, `photos.txt`, `users.txt`, `voters.txt`) are used as simple storage for exercises.
- Image folders contain assets used by the corresponding lab pages.
- If using the built-in PHP server, navigate to the correct script in the browser (e.g., `http://localhost:8000/index.php` or `http://localhost:8000/list.php`).

## License
Educational use. See individual lab PDFs for exercise statements and any constraints.