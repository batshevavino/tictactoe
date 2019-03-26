(function () {

    var pictures = ["toe", "tic1", "tac1"];
    player = 1;
    computer = 2;
    var opens = [];
    var opensCopy = [];
    var finish = 0;
    var mone = 0;


    function begin() {
        opens = [];
        finish = 0;
        mone = 0;
        closePictures();
    }

    function gebId(element) {
        return document.getElementById(element); // פונ' שמחזירה את כל ההפנייה.
    }

    function userUpdateDetails(){
        {window.location.href='updateDetails.php';}
    }


    //המשחק הסתיים בנצחון של השחקן האנושי
    function playerVictory(player) {
        setTimeout(function () {
            alert("כל הכבוד-הצלחת")
        }, 500);
        finish = 1;
        setTimeout(function () {
            alert("המשחק הסתיים")
        }, 500);
        opens = [];
        setTimeout(function () {
            updateUser("1");
        }, 500);
    }

    //המשחק הסתיים בנצחון של השחקן המחשב
    function computerVictory(player) {
        finish = 1;
        setTimeout(function () {
            alert("אופס... הפסדת... בהצלחה בפעם הבאה")
        }, 500);
        opens = [];
        setTimeout(function () {
            updateUser("2");
        }, 500);
    }

    //הפונקציה מעדכנת את בסיס הנתונים בתוצאת המשחק
    function updateUser(mazav) {
        let id = gebId("inputId").value;
        if (id==0) return;//אם זה משחק חופשי ואין זיהוי משתמש לא מעדכנים
        switch (mazav) {
            case "1":
                gebId("inputWin").value++;
                break;
            case "2":
                gebId("inputLoss").value++;
                break;
            case "3":
                gebId("inputTeko").value++;
                break;
            default:
                alert("סליחה, תקלה");
        }
        let win = (gebId("inputWin").value);
        let loss = (gebId("inputLoss").value);
        let teko = (gebId("inputTeko").value);
        
        let request = {
            url: "updateDB.php",
            method: "POST",
            data: {
                "win": win,
                "loss": loss,
                "teko": teko,
                "id": id
            },
            success: function (result) {
                setTimeout(function () {
                    location.reload();
                },500);
            }
        };


        $.ajax(request).catch((error) => {
            document.write(error)
        });
    }


    //האם מצב נוכחי של הלוח הוא ניצחון של המשתתף שהועבר לפונקציה
    function checkVictory(player, cards) {
        tictactoe = false;
        for (i = 0; i < 3; i++) {

            if ((cards[3 * i] == player) && (cards[3 * i + 1] == player) && (cards[3 * i + 2] == player)) tictactoe = true;
            if ((cards[i] == player) && (cards[i + 3] == player) && (cards[i + 6] == player)) tictactoe = true;
        }
        if ((cards[0] == player) && (cards[4] == player) && (cards[8] == player)) tictactoe = true;
        if ((cards[2] == player) && (cards[4] == player) && (cards[6] == player)) tictactoe = true;
        return tictactoe;
    }
    //בדיקה האם השחקן ניצח
    function checkPlayerVictory(player) {
        if (checkVictory(player, opens)) playerVictory(player);
    }


    //בחירת המהלך הבא של המחשב
    function computerPlay() {

        //1. האם יש מהלך שיוביל לניצחון מיידי
        //אם בשורה, בטור או באלכסון מסומנות שתי משבצות של המחשב – לסמן את המשבצת השלישית
        opensCopy = opens;
        for (j = 0; j < 9; j++) {
            if (!opensCopy[j]) {
                opensCopy[j] = computer;

                if (checkVictory(computer, opensCopy)) {
                    play(j); //המחשב מבצע את המהלך שנבחר
                    computerVictory(); //המחשב ניצח-סיום משחק
                    return;
                } else {
                    opensCopy[j] = null;
                }
            }
        }
        //2. האם יש מהלך שחוסם ניצחון מיידי של השחקן האנושי?
        //אם בשורה, בטור או באלכסון מסומנות שתי משבצות של היריב – לסמן את המשבצת השלישית
        opensCopy = opens;
        for (j = 0; j < 9; j++) {
            if (!opensCopy[j]) {
                opensCopy[j] = player;

                if (checkVictory(player, opensCopy)) {
                    play(j); //המחשב מבצע את המהלך שנבחר
                    return;
                } else {
                    opensCopy[j] = null;

                }
            }
        }

        //3. אם לכל היותר משבצת אחת מסומנת על הלוח וגם המשבצת האמצעית פנויה – לסמן את המשבצת האמצעית
        opensCopy = opens;
        var opensNum = 0; //מספר המשבצות המסומנות על הלוח
        for (j = 0; j < 9; j++) {
            if (opensCopy[j]) {
                opensNum++;
            }

            if ((opensNum <= 1) && (!opensCopy[4])) {
                play(4); //המחשב בוחר את המשבצת האמצעית
                return;
            }
        }

        //4. אם שלוש משבצות מסומנות, המשבצת המרכזית של המחשב ושתי משבצות מנוגדות מסומנות– לסמן משבצת קצה
        if ((opensNum == 3) && (opensCopy[4] == computer)) {

            var opensIdNum = 0; //סכום מזהה המיקום של המשבצות המסומנות על הלוח
            for (j = 0; j < 9; j++) {
                if (opensCopy[j] == player) {
                    opensIdNum = opensIdNum + j;
                }
            }

            if (opensIdNum == 8) //שתי משבצות מנוגדות מסומנות
            {
                //נבחר משבצת קצה
                var k = 1;
                while (k < 8) {
                    if (!opensCopy[k]) {
                        play(k);
                        return;
                    }
                    k = k + 2;
                }
            }
        }

        //5.אם שלוש משבצות מסומנות והמשבצת המרכזית שלי - לסמן פינה הנמצאת באותו טור/שורה עם שתי המשבצות של היריב ביחד
        if ((opensNum == 3) && (opensCopy[4] == computer)) {
            if (opensCopy[5]) {
                if ((opensCopy[1]) || (opensCopy[0])) {
                    play(2);
                    return;
                }
                play(8);
                return;
            }
            if (opensCopy[3]) {
                if ((opensCopy[1]) || (opensCopy[2])) {
                    play(0);
                    return;
                }
                play(6);
                return;
            }
            if (opensCopy[0]) {
                play(6);
                return;
            }
            if (opensCopy[2]) {
                play(8);
                return;
            }
            if (opensCopy[8]) {
                play(2);
                return;
            }
            play(0);
            return;
        }
        //6. אם יש פינה פנויה ומשני צדדיה שתי שורות ריקות – לסמן את הפינה
        if (!opensCopy[0]) {
            if ((!opensCopy[1]) && (!opensCopy[2]) && (!opensCopy[3]) && (!opensCopy[6])) {
                play(0);
                return;
            }
        }
        if (!opensCopy[2]) {
            if ((!opensCopy[1]) && (!opensCopy[0]) && (!opensCopy[5]) && (!opensCopy[8])) {
                play(2);
                return;

            }
        }

        if (!opensCopy[6]) {
            if ((!opensCopy[0]) && (!opensCopy[3]) && (!opensCopy[7]) && (!opensCopy[8])) {
                play(6);
                return;

            }
        }

        if (!opensCopy[8]) {
            if ((!opensCopy[2]) && (!opensCopy[5]) && (!opensCopy[6]) && (!opensCopy[7])) {
                play(8);
                return;

            }
        }

        //7. אם המשבצת האמצעית פנויה – לסמן את המשבצת האמצעית
        if (!opensCopy[4]) {
            play(4); //המחשב בוחר את המשבצת האמצעית
            return;

        }
        //8. אם יש שלוש משבצות פנויות בשורה או באלכסון – לסמן את הפינה.
        if ((!opensCopy[2]) && (!opensCopy[1]) && (!opensCopy[0])) {
            play(0);
            return;

        }
        if ((!opensCopy[0]) && (!opensCopy[3]) && (!opensCopy[6])) {
            play(0);
            return;

        }
        if ((!opensCopy[6]) && (!opensCopy[7]) && (!opensCopy[8])) {
            play(6);
            return;

        }
        if ((!opensCopy[2]) && (!opensCopy[5]) && (!opensCopy[8])) {
            play(2);
            return;

        }
        if ((!opensCopy[0]) && (!opensCopy[4]) && (!opensCopy[8])) {
            play(8);
            return;

        }
        if ((!opensCopy[2]) && (!opensCopy[4]) && (!opensCopy[6])) {
            play(6);
            return;

        }
        //9. אם יש שתי משבצות מנוגדות והמשבצת האמצעית שלי – לסמן אחת משתיים
        if (opensCopy[4] == computer) {
            if ((!opensCopy[0]) && (!opensCopy[8])) {
                play(8);
                return;
            }
            if ((!opensCopy[2]) && (!opensCopy[6])) {
                play(2);
                return;
            }
            if ((!opensCopy[1]) && (!opensCopy[7])) {
                play(1);
                return;
            }
            if ((!opensCopy[3]) && (!opensCopy[5])) {
                play(3);
                return;
            }
        }

        //10. אם יש משבצת פינתית פנויה - לסמן אותה

        if (!opensCopy[0]) {
            play(0);
            return;
        }
        if (!opensCopy[2]) {
            play(2);
            return;
        }
        if (!opensCopy[6]) {
            play(6);
            return;
        }
        if (!opensCopy[8]) {
            play(8);
            return;
        }



        //11. אם יש משבצת פנויה - לסמן אותה 
        for (f = 0; f < 9; f++) {
            if (!opensCopy[f]) {
                play(f);
                return;
            }
        }
    }
    //המחשב בוחר את המשבצת מספר שהועבר כפרמטר לפונקציה
    function play(i) {
        opens[i] = computer;
        gebId(i).src = "../pictures/" + pictures[computer] + ".jpg";
        mone++;
    }

    begin();


    $('.cardi').on('click', function () {
        var cardid = $(this).attr('id');
        if (opens[cardid]) {
            alert(" המקום תפוס");
            return
        }
        if (finish) {
            alert(" התחל משחק חדש");
            return
        }

        opens[cardid] = player;

        mone++;

        this.src = "../pictures/" + pictures[player] + ".jpg";

        checkPlayerVictory(player);
        if (mone < 9) {
            computerPlay();
        } else {
            setTimeout(function () {
                alert("המשחק הסתיים בתוצאה תיקו")
            }, 500);
            setTimeout(function () {
                updateUser("3");
            }, 500);
        }

    });

    function closePictures() {
        var all = document.querySelectorAll(".cardi");
        all.forEach(function (img) {
            img.src = "../pictures/reka.jpg"
        });
        mone = 0;
        opens = [];
    };

    function userOut() {
        let request = {
            url: "out.php",
            method: "POST",
            
            success: function (result) {
                alert("להתראות");
                window.location.href='index.php';
            }
        };
        $.ajax(request).catch((error) => {
            document.write(error)
        });
    };

//אתחול משחק
    $('#btn1').on('click', function () {
        begin();
    })
//יציאת משתמש
    $('#btn2').on('click', function () {
        userOut();
    })
//מעבר למסך עדכון פרטים אישיים של משתמש
    $('#btn3').on('click', function () {
        userUpdateDetails();
    })


})();