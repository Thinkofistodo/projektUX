-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Mar 2023, 05:47
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `chawrona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `excercise_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `excercise_id`, `text`, `createdOn`) VALUES
(11, 1, 9, 'Jeżeli chodzi o to co jest w mainie, no to polecam przejrzeć wykład 2 z tego semestru', '2023-03-29 05:46:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `excercises`
--

CREATE TABLE `excercises` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `solution` text NOT NULL,
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `excercises`
--

INSERT INTO `excercises` (`id`, `title`, `description`, `solution`, `list_id`, `user_id`, `createdOn`) VALUES
(1, 'TERAZ GIT', 'TERAZ GIT', 'TERAZ GIT', 1, 1, '2023-03-28 00:00:00'),
(2, 'zadanie 2', 'opis 2', 'kod 2', 1, 1, '2023-03-28 01:00:00'),
(3, 'zadanie 3', 'To będzie bardzo długo opis zadania, aby przetestować bazę danych. Chcę mi się płakać z powodu PHP. Nienawidzę tego języka', 'kod 3', 1, 1, '2023-03-28 03:00:00'),
(4, 'wykład 1', 'w1', 'w1', 2, 1, '2023-03-28 00:00:00'),
(5, 'wykład 2', 'w2', 'w2', 2, 1, '2023-03-28 02:00:00'),
(6, 'wykład 3', 'w3', 'w3', 2, 1, '2023-03-28 00:00:00'),
(7, 'Zadanie Najnowsze', 'opisik', 'kodzik', 1, 1, '2023-03-29 05:04:49'),
(8, 'aLGORYTMY', 'asdasdasdasdasd', 'asdasdasd', 7, 1, '2023-03-29 05:07:01'),
(9, 'Zadanie 1', 'Napisz funkcję posiadającą dwa parametry - pierwszy typu char*, drugi typu char. Funkcja\r\nposzukuje w łańcuchu miejsca pierwszego wystąpienia znaku. W przypadku znalezienia\r\nznaku, funkcja ma zwrócić wskaźnik do niego, w przeciwnym wypadku wskaźnik pusty\r\n(w podobny sposób działa funkcja strchr()). Wykorzystaj funkcję w przykładowym\r\nprogramie', '#include <stdio.h>\r\n#include <stdlib.h>\r\n\r\nvoid f(char* string){\r\n    char* string2 = string;\r\n    while(*string2 != \'\\0\'){\r\n        while(*string2 == \' \') string2++;\r\n        *string = *string2;\r\n         string++;\r\n         string2++;\r\n    }\r\n    string2++;\r\n    *string2 = \'\\0\';\r\n}\r\n\r\nint main() {\r\n    char* tekst = malloc(80 * sizeof(char));\r\n    gets(tekst);\r\n    f(tekst);\r\n    printf(\"%s\", tekst);\r\n    return 0;\r\n}', 8, 1, '2023-03-29 05:42:37'),
(10, 'Zadanie 2', 'Napisz funkcję posiadającą dwa parametry będące wskaźnikami typu char* (podobnie jak\r\nw funkcji strcpy()). Funkcja powinna zamienić w tekście znajdującym się w tablicy\r\npodanej jako drugi argument wszystkie znaki odstępu na znaki podkreślenia i umieścić go\r\nw tablicy podanej jako pierwszy argument (zawartość tablicy podanej jako drugi argument\r\nma pozostać niezmieniona). Kody znaku odstępu i podkreślenia oznaczane są przez ’ ’ i\r\n’_’. Wykorzystaj funkcję w przykładowym programie.', '#include <stdio.h>\r\n#include <stdlib.h>\r\n#include <time.h>\r\n\r\nint main() {\r\n    srand(time(NULL));\r\n  \r\n    char* article[3] = {\"ta\", \"ten\", \"to\"};\r\n    char* noun[6] = {\"chlopak\", \"dziewczyna\", \"pies\", \"miasto\", \"samochod\", \"kot\"};\r\n    char* verb[4] = {\"skoczyl\", \"uciekl\", \"szedl\", \"przeskoczyl\"};\r\n    char* preposition[5] = {\"do\", \"z\", \"na\", \"nad\", \"pod\"};\r\n \r\n    for (int i = 0; i < 20; i++) {\r\n        char* zdanie[6];\r\n        \r\n        zdanie[0] = article[rand() % 3];\r\n        zdanie[1] = noun[rand() % 6];\r\n        zdanie[2] = verb[rand() % 4];\r\n        zdanie[3] = preposition[rand() % 5];\r\n        zdanie[4] = article[rand() % 3];\r\n        zdanie[5] = noun[rand() % 6];\r\n        \r\n        for (int i = 0; i < 6; i++) printf(\"%s \", zdanie[i]);\r\n        printf(\"\\n\");\r\n    }\r\n    \r\n    return 0;\r\n}', 8, 1, '2023-03-29 05:43:00'),
(11, 'Zadanie 3', 'Napisz funkcję void merger(char *s3, const char *s1, const char *s2);\r\numieszczającą w tablicy wskazywanej przez s3 najpierw napis wskazywany przez s1\r\n(z pominięciem kończącego go ’\\0’), a następnie napis wskazywany przez s2. W programie\r\npobrać z wejścia dwa łańcuchy str1 oraz str2, które będą argumentami funkcji\r\nmerger(). Utwórz dynamiczną tablicę str3 o odpowiednim rozmiarze, tak aby można\r\nbyło scalić do niej oba łańcuchy wywołując funkcję merger()dla tych argumentów.', 'void funkcja(char* str){\r\n    int length = 0;\r\n    char* str2 = str;\r\n    while(*str2 != \'\\0\'){\r\n        length++;\r\n        str2++;\r\n    }\r\n    for(int i = 0; i < length / 2; i++){\r\n        char first = str[i];\r\n        str[i] = str[length - i - 1];\r\n        str[length - i - 1] = first;\r\n    }\r\n}', 9, 1, '2023-03-29 05:43:20'),
(12, 'Zadanie 5', 'Napisać funkcję obliczającą liczbę wyrazów w napisie podanym jako argument. Przyjąć, że\r\nwyraz to ciąg kolejno następujących po sobie znaków złożony z samych liter. Można\r\nskorzystać z funkcji bibliotecznej int isalpha(int c), która zwraca wartość różną od\r\nzera, gdy jej argument jest kodem wielkiej lub małej litery.', 'void funkcja(char* str){\r\n    int length = 0;\r\n    char* str2 = str;\r\n    while(*str2 != \'\\0\'){\r\n        length++;\r\n        str2++;\r\n    }\r\n    for(int i = 0; i < length; i++){\r\n        if(str[i] != str[length - i - 1]) {\r\n            printf(\"Nie palindrom.\");\r\n            return;\r\n        }\r\n    }\r\n    printf(\"Palindrom.\");\r\n}', 9, 1, '2023-03-29 05:43:52'),
(13, 'Zadanie 11', 'Utwórz program, który pobiera od użytkownika tekst i pewną frazę. Wykorzystując funkcję\r\nstrstr(), program powinien wyszukać pierwsze wystąpienie tej frazy w podanym\r\nwierszu tekstu, a następnie znalezione położenie przypisać do zmiennej search_ptr typu\r\nchar*. Jeżeli szukana fraza zostanie znaleziona, należy wyświetlić pozostałą część wiersza,\r\npocząwszy od znalezionej frazy. Następnie funkcja strstr() ma zostać użyta do\r\nznalezienia kolejnych wystąpień frazy w wierszu tekstu. Jeżeli zostanie znalezione drugie (i\r\nkolejne) wystąpienie szukanej frazy, należy wyświetlić pozostałą część tekstu począwszy od\r\nznalezionego drugiego (kolejnych) wystąpienia szukanej frazy. Wskazówka: drugie\r\nwywołanie funkcji strstr() powinno zawierać pierwszy argument w postaci\r\nsearch_ptr + 1.', '#include <stdio.h>\r\n#include <string.h>\r\n#include <stdlib.h>\r\n\r\nint main() {\r\n   \r\n\r\n    // Deklarujemy string do zapisywania w nim zdań\r\n    char* string = malloc(80 * sizeof(char));\r\n    // Zmienna, która liczy numer wczytanej linii\r\n    int index = 1;\r\n    \r\n    // Zmienne opisujące stringa, którego będziemy zwracać\r\n    char* maxString = malloc(80 * sizeof(char));;\r\n    int maxIndex = 1;\r\n    size_t maxLength = 0;\r\n    \r\n    while (1) {\r\n        // Wczytujemy stringa scanem (80 to max długość w terminalu do wpisania)\r\n        scanf(\"%80s\", string);\r\n    \r\n        // porównujemy stringi (pointer i literał). Jak zero to są takie same\r\n        if (strcmp(string, \"stop\") == 0) { \r\n            // printujemy dane, %zu to printowanie dla typu \"size_t\" - typ opisujący długości, zwracany m.in. przez strlen()\r\n            printf(\"String %s, Index %d, Length %zu\", maxString, maxIndex, maxLength);\r\n            // kończymy działanie wiecznej pętli słowem kluczowym brake\r\n            break;\r\n        }\r\n        // sprawdzamy czy długość stringa jest większa od aktualnego najdłuższego\r\n        if (strlen(string) > maxLength) {\r\n            // jak tak to nadpisujemy tamten string, zapisujemy jego długość i numer\r\n            strcpy(maxString, string);\r\n            maxLength = strlen(string);\r\n            maxIndex = index;\r\n        }\r\n        // zwiększamy aktualy numer wczytywanych linii\r\n        index++;\r\n    }\r\n    \r\n    return 0;\r\n}', 10, 1, '2023-03-29 05:44:37'),
(14, 'Zadanie 2', 'Napisz i przetestuj funkcję, która jako argument pobiera łańcuch i usuwa z niego znaki\r\nodstępu ’ ’. Funkcja nie powinna wykorzystywać dodatkowego bloku pamięci do\r\nwykonania tej operacji. Można założyć, że słowa w łańcuchu rozdzielone są pojedynczym\r\nznakiem odstępu. Wykorzystaj funkcję w przykładowym programie.\r\n', 'void funkcja(char* str){\r\n    int length = 0;\r\n    char* str2 = str;\r\n    while(*str2 != \'\\0\'){\r\n        length++;\r\n        str2++;\r\n    }\r\n    for(int i = 0; i < length / 2; i++){\r\n        char first = str[i];\r\n        str[i] = str[length - i - 1];\r\n        str[length - i - 1] = first;\r\n    }\r\n}', 10, 1, '2023-03-29 05:44:57'),
(15, 'Zadanie 6', 'Napisz funkcję posiadającą dwa parametry będące wskaźnikami typu char*. Funkcja\r\npowinna usuwać w tekście znajdującym się w tablicy podanej jako pierwszy argument\r\nwszystkie wystąpienia łańcucha będącego drugim argumentem. Wykorzystaj funkcję w\r\nprzykładowym programie.', '#include <ctype.h>\r\nint funkcja(char* str){\r\n    int wyrazy = 0;\r\n    while (*str != \'\\0\') {\r\n        if (isalpha(*str) == 0 && isalpha(*(str - 1)) != 0) wyrazy++;\r\n        str++;\r\n    }\r\n    if (isalpha(*(str - 1)) != 0) wyrazy++;\r\n    return wyrazy;\r\n}', 10, 1, '2023-03-29 05:45:13'),
(16, 'Zadanie 1', 'Utwórz program pobierający ciąg tekstowy numeru telefonu w postaci (555) 555-5555.\r\nProgram powinien używać funkcji strtok() do wyodrębniania tokenów w postaci numeru\r\nkierunkowego, pierwszych trzech cyfr numeru telefonu i ostatnich czterech cyfr numeru\r\ntelefonu. Następnie siedem cyfr tworzących numer telefonu ma zostać połączonych w jeden\r\nciąg tekstowy. Program powinien skonwertować na wartość typu int ciąg tekstowy numeru\r\nkierunkowego oraz na wartość typu long int ciąg tekstowy numeru telefonu (można\r\nwykorzystać funkcje biblioteczne). W wyniku działania programu mają zostać wyświetlone\r\nnumer kierunkowy i numer telefonu (jako liczby)\r\n', 'void funkcja(char* str){\r\n    int length = 0;\r\n    char* str2 = str;\r\n    while(*str2 != \'\\0\'){\r\n        length++;\r\n        str2++;\r\n    }\r\n    for(int i = 0; i < length; i++){\r\n        if(str[i] != str[length - i - 1]) {\r\n            printf(\"Nie palindrom.\");\r\n            return;\r\n        }\r\n    }\r\n    printf(\"Palindrom.\");\r\n}', 11, 1, '2023-03-29 05:45:40'),
(17, 'Zadanie 2', 'Utwórz program, który pobiera jeden wiersz tekstu (słowa w tekście rozdzielone są\r\nspacjami), tokenizuje go za pomocą funkcji strtok() oraz wyświetla tokeny w odwrotnej\r\nkolejności. Wykorzystaj tablicę wskaźników do typu char do „przechowania” wydzielonych\r\ntokenów.', 'void funkcja(char* str){\r\n    int length = 0;\r\n    char* str2 = str;\r\n    while(*str2 != \'\\0\'){\r\n        length++;\r\n        str2++;\r\n    }\r\n    for(int i = 0; i < length / 2; i++){\r\n        char first = str[i];\r\n        str[i] = str[length - i - 1];\r\n        str[length - i - 1] = first;\r\n    }\r\n}', 11, 1, '2023-03-29 05:45:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `lists`
--

INSERT INTO `lists` (`id`, `name`, `type`) VALUES
(8, 'Lista 1', 'programowanie'),
(9, 'Wykład 2', 'programowanie'),
(10, 'Wykład 1', 'algorytmy'),
(11, 'Ćwiczenia 2', 'algorytmy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(70) NOT NULL,
  `image` varbinary(8000) DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `createdOn` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `isAdmin`, `createdOn`) VALUES
(1, 'admin', 'admin', '$2y$10$z9FBbKvq8CK3YeehuJ59DuL.sLqST.2lqsQ0VNA/DGF9..ejSOK82', NULL, 1, '2023-03-29 05:31:23'),
(11, 'dawid', 'dawid@dawid.pl', '$2y$10$whgOVHdcVA/4w3LjiG5l5uI.n5r6pwaAGAxQ7QXE0MH8XJ5NObgIG', NULL, 0, '2023-03-29 05:30:44');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`excercise_id`);

--
-- Indeksy dla tabeli `excercises`
--
ALTER TABLE `excercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `list_id` (`list_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `excercises`
--
ALTER TABLE `excercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
