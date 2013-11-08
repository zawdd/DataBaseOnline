-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 22 日 11:44
-- 服务器版本: 5.5.32-0ubuntu0.13.04.1
-- PHP 版本: 5.4.9-4ubuntu2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ExamOnline`
--

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `programkey`(pnum int)
begin
  SELECT panswer FROM Pexercise WHERE Peno='pnum';
  SELECT panswer;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showAllProblems`(IN problemclass varchar(20), IN begnumber int, IN endnumber int)
BEGIN
IF (problemclass="Cexercise") THEN
SELECT * FROM Cexercise INNER JOIN Chapter ON Cexercise.Ccno=Chapter.Cno INNER JOIN Knowledge ON Cexercise.Cstyle=Knowledge.Kno ORDER BY Cexercise.Ceno LIMIT begnumber,endnumber;
END IF;
IF (problemclass="Pexercise") THEN
SELECT * FROM Pexercise INNER JOIN Chapter ON Pexercise.Pcno=Chapter.Cno INNER JOIN Knowledge ON Pexercise.Pstyle=Knowledge.Kno ORDER BY Pexercise.Peno LIMIT begnumber,endnumber;
END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showOneProblem`(IN problemclass varchar(20), IN problemid INT)
BEGIN
IF (problemclass="Cexercise") THEN
SELECT * FROM Cexercise INNER JOIN Chapter ON Cexercise.Ccno=Chapter.Cno INNER JOIN Knowledge ON Cexercise.Cstyle=Knowledge.Kno WHERE Cexercise.Ceno=problemid;
END IF;
IF (problemclass="Pexercise") THEN
SELECT * FROM Pexercise INNER JOIN Chapter ON Pexercise.Pcno=Chapter.Cno INNER JOIN Knowledge ON Pexercise.Pstyle=Knowledge.Kno WHERE Pexercise.Peno=problemid;
END IF;

END$$

--
-- 函数
--
CREATE DEFINER=`root`@`localhost` FUNCTION `addTeacher`(id varchar(20),name varchar(10),sex varchar(2),age smallint,nation varchar(10),bp varchar(20),password varchar(40),school varchar(20),regist date,status varchar(5),pt varchar(10),search varchar(20),count smallint,email varchar(200),phone varchar(20)) RETURNS int(11)
begin
  INSERT INTO User VALUES (id,name,sex,age,nation,bp,password,school,regist,status,email,phone);
  INSERT INTO Teacher VALUES (id,pt,search,count);
return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `add_user`(uid varchar(20), uname varchar(10), usex varchar(2), uage smallint, unation varchar(10), ubp varchar(20), upassword varchar(40), uschool varchar(20), regdate varchar(20), ustatus varchar(2)) RETURNS int(11)
begin
  INSERT INTO `ExamOnline`.`User` (`UID`, `Uname`, `Usex`, `Uage`, `Unation`, `UBP`, `Upassword`, `Uschool`, `regdate`, `Ustatus`) VALUES ('uid', 'uname', 'usex', 'uage', 'unation', 'ubp', 'upassword', 'uschool', 'regdate', 'ustatus');
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `answerOneProgramProblem`(problemid INT,sno varchar(10), hno int,ename varchar(50)) RETURNS int(11)
BEGIN
DECLARE ifhasbeeninsert INT;
DECLARE result INT;
DECLARE ano INT;
DECLARE submitnum INT;
SELECT count(*) INTO ifhasbeeninsert FROM PexerciseAnswerForstudent WHERE Peno=problemid AND Psno=sno AND Phno=hno;
IF (ifhasbeeninsert = 0 )THEN /*insert*/
INSERT INTO PexerciseAnswerForstudent (Pano, Peno, Paname, Psno, Pstate, Presult, Pscore, Phno, Pnum, Ptime) VALUES (NULL, problemid, ename, sno, '0', NULL, '0', hno, '1', CURRENT_TIMESTAMP);
SET result = 1;
END IF;
IF (ifhasbeeninsert !=0 )THEN /*update*/
SELECT Pano INTO ano FROM PexerciseAnswerForstudent WHERE Peno=problemid AND Psno=sno AND Phno=hno;
SELECT Pnum INTO submitnum FROM PexerciseAnswerForstudent WHERE Peno=problemid AND Psno=sno AND Phno=hno;
SET submitnum = submitnum + 1;
UPDATE PexerciseAnswerForstudent SET Paname=ename,Pstate='0',Presult= NULL, Pnum=submitnum, Ptime = CURRENT_TIMESTAMP WHERE Pano=ano;
SET result = 2;
END IF;
RETURN result;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `deleteProblem`(problemclass varchar(20), problemid int) RETURNS int(11)
BEGIN
DECLARE flag INT;
DECLARE result INT;
IF (problemclass="Cexercise") THEN
SELECT count(*) INTO flag FROM CexerciseAnswerForstudent WHERE Ceno=problemid;
END IF;
IF (problemclass="Pexercise") THEN 
SELECT count(*) INTO flag FROM PexerciseAnswerForstudent WHERE Peno=problemid;
END IF;

IF (flag != 0) THEN 
SET result = 0;
RETURN result;
END IF;

IF (problemclass="Cexercise") THEN
DELETE FROM Cexercise WHERE Ceno=problemid;
END IF;
IF (problemclass="Pexercise") THEN
DELETE FROM Pexercise WHERE Peno=problemid;
END IF;

SET result = 1;

RETURN result;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `initExam`(num int,cnum varchar(10),name varchar(50),releasetime date,deadtime date,totaltime varchar(10),knum int,stage varchar(2),numa smallint,numas varchar(100),numb smallint,numbs varchar(100),numc smallint,numcs varchar(100),numd smallint,numds varchar(100)) RETURNS int(11)
begin  
  INSERT INTO Exam VALUES(num,cnum,name,releasetime,deadtime,totaltime,knum,stage,numa,numas,numb,numbs,numc,numcs,numd,numds);
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `loginTeacher`(tno varchar(20),tpassword varchar(40)) RETURNS int(11)
begin
  DECLARE login varchar(20);
  SELECT tno into login FROM User WHERE UID=tno AND Upassword=tpassword AND Ustatus='T';
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `loginTeacherlogin`(tno varchar(20),tpassword varchar(40)) RETURNS int(11)
begin
  DECLARE login varchar(20);
  SELECT tno into login FROM User WHERE UID=tno AND Upassword=tpassword AND Ustatus='T';
  return login;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `logTeacher`(itno varchar(20)) RETURNS int(11)
begin
  declare otno varchar(20);
  SELECT `Tno` into 'otno' FROM `Teacher` WHERE Tno='itno';
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `normalAnswer`(cnumber smallint,hnum int,snum varchar(20)) RETURNS varchar(200) CHARSET latin1
begin
  DECLARE answer varchar(200);
  SELECT Canswer into answer FROM CexerciseAnswerForstudent WHERE Cnum=cnumber AND Chno=hnum AND Sno=snum;
return answer;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `normalkey`(cnum int) RETURNS varchar(1000) CHARSET latin1
begin
  DECLARE noranswer varchar(1000);
  SELECT Canswer into noranswer FROM Cexercise WHERE Ceno=cnum;
  return noranswer;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `programAnswer`(pnumber smallint,hnum int,snum varchar(20)) RETURNS varchar(50) CHARSET latin1
begin
  DECLARE answer varchar(50);
  SELECT Paname into answer FROM PexerciseAnswerForstudent WHERE Pnum=pnumber AND Phno=hnum AND Psno=snum;
return answer;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `programkey`(pnum int) RETURNS varchar(1000) CHARSET latin1
begin
  DECLARE proanswer varchar(1000);
  SELECT panswer into proanswer FROM Pexercise WHERE Peno=pnum;
  return proanswer;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `studentAddTeacher`(snum varchar(20),tnum varchar(20),school varchar(20)) RETURNS int(11)
begin
  declare addstno varchar(20);
  SELECT tno into addstno FROM Teacher,User WHERE Teacher.Tno=User.UID AND Tno='tnum' AND Uschool='school';
  UPDATE Student SET Stno='addstno' WHERE Sno='snum';
return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `teacherAddStudent`(snum varchar(20),tnum varchar(20),school varchar(20)) RETURNS int(11)
begin
  DECLARE teachernumber varchar(20);
  SELECT UID INTO teachernumber FROM User WHERE UID=tnum AND Uschool=school;
  UPDATE Student SET Stno=teachernumber WHERE Sno=snum;
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `teacherDeleteAllStudent`(tnum varchar(20)) RETURNS int(11)
begin
  UPDATE Student SET Stno=NULL WHERE Stno=tnum;
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `teacherDeleteStudent`(snum varchar(20),tnum varchar(20)) RETURNS int(11)
begin
  UPDATE Student SET Stno=NULL WHERE Sno=snum AND Stno=tnum;
  return 1;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateCommonProblem`(problemid INT, cno varchar(10), style int, econtent varchar(1000), answer varchar(1000),  score int, stage varchar(5)) RETURNS int(11)
BEGIN
DECLARE chapternumber INT;
DECLARE knowledgenumber INT;
DECLARE flag INT;
DECLARE result INT;
SELECT count(*) INTO flag FROM CexerciseAnswerForstudent WHERE Ceno=problemid;
IF (flag != 0) THEN 
SET result = 0;
RETURN result;
END IF;
/*chapter name and knowledge name must be unique
SELECT Cno INTO chapternumber FROM Chapter WHERE Cname=chaptername;
SELECT Kno INTO knowledgenumber FROM Knowledge WHERE Kname=knowledgename;*/
UPDATE Cexercise SET Ccno=cno, Cecontent=econtent, Canswer=answer, Cscore=score, Cstyle=style, Cstage=stage WHERE Ceno=problemid;
SET result = 1;
RETURN result;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updatenormalscore`(snum varchar(20),examnum int,problemno smallint,score smallint) RETURNS int(11)
begin 
DECLARE oldnormalscore smallint; 
DECLARE oldscore smallint; 
SELECT Cscore into oldnormalscore FROM CexerciseAnswerForstudent WHERE Sno=snum AND Chno=examnum AND Cnum=problemno; 
SELECT Ahscore into oldscore FROM ExamAnswerForStudent WHERE Asno=snum AND Ahno=examnum; 
UPDATE CexerciseAnswerForstudent SET Cscore=score WHERE Sno=snum AND Chno=examnum AND Cnum=problemno; 
UPDATE ExamAnswerForStudent SET Ahscore= oldscore+score-oldnormalscore WHERE Asno=snum AND Ahno=examnum; 
return oldnormalscore;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateProgramProblem`(problemid INT,cno varchar(10), style int,econtent varchar(1000),answer varchar(1000), score INT, stage varchar(5)) RETURNS int(11)
BEGIN
DECLARE chapternumber INT;
DECLARE knowledgenumber INT;
DECLARE flag INT;
DECLARE result INT;
SELECT count(*) INTO flag FROM PexerciseAnswerForstudent WHERE Peno=problemid;
IF (flag != 0) THEN 
SET result = 0;
RETURN(result);
END IF;

UPDATE Pexercise SET Pcno=cno, Pecontent=econtent, Panswer=answer, Pscore=score, Pstyle=style, Pstage=stage WHERE Peno=problemid;

SET result = 1;
RETURN result;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `updateprogramscore`(snum varchar(20),pnum int,score smallint,pno int) RETURNS int(11)
begin
  DECLARE oldprogramscore smallint;
  DECLARE oldscore smallint;
  SELECT Pscore into oldprogramscore FROM PexerciseAnswerForstudent WHERE Psno=snum AND Phno=pnum AND pnumber=pno;
  SELECT Ahscore into oldscore FROM ExamAnswerForStudent WHERE Asno=snum AND Ahno=pnum;
  UPDATE PexerciseAnswerForstudent SET Pscore=score WHERE Psno=snum AND Phno=pnum AND pnumber=pno;
  UPDATE ExamAnswerForStudent SET Ahscore= oldscore+score-oldprogramscore WHERE Asno=snum AND Ahno=pnum;
  return 1;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `Administrator`
--

CREATE TABLE IF NOT EXISTS `Administrator` (
  `Ano` varchar(20) NOT NULL COMMENT '管理员号',
  PRIMARY KEY (`Ano`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `Cexercise`
--

CREATE TABLE IF NOT EXISTS `Cexercise` (
  `Ceno` varchar(50) NOT NULL COMMENT '习题号',
  `Ccno` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT '章节号',
  `Cename` varchar(15) NOT NULL COMMENT '习题名称(填空/选择/简答)',
  `Cscore` smallint(6) NOT NULL COMMENT '习题分值',
  `Cstyle` varchar(50) NOT NULL COMMENT '所属知识点',
  `Cstage` varchar(5) CHARACTER SET latin1 NOT NULL COMMENT '难度系数(A/B/C/D)',
  PRIMARY KEY (`Ceno`),
  KEY `Ccno` (`Ccno`),
  KEY `Cstyle` (`Cstyle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Cexercise`
--

INSERT INTO `Cexercise` (`Ceno`, `Ccno`, `Cename`, `Cscore`, `Cstyle`, `Cstage`) VALUES
('01tk01', '100', 'tk', 1, '1', 'B'),
('01tk02', '100', 'tk', 1, '1', 'B'),
('01tk03', '100', 'tk', 1, '1', 'B'),
('01tk04', '100', 'tk', 1, '1', 'B'),
('01tk05', '100', 'tk', 1, '1', 'B'),
('01tk06', '100', 'tk', 1, '1', 'B'),
('01tk07', '100', 'tk', 1, '1', 'B'),
('01xz01', '100', 'xz', 1, '1', 'B'),
('01xz02', '100', 'xz', 1, '1', 'B'),
('01xz03', '100', 'xz', 1, '1', 'B'),
('01xz04', '100', 'xz', 1, '1', 'B'),
('01xz05', '100', 'xz', 1, '1', 'B'),
('01xz06', '100', 'xz', 1, '1', 'B'),
('01xz07', '100', 'xz', 1, '1', 'B'),
('01xz08', '100', 'dx', 1, '1', 'B'),
('01xz09', '100', 'xz', 1, '1', 'B'),
('01xz10', '100', 'xz', 1, '1', 'B'),
('01xz11', '100', 'xz', 1, '1', 'B'),
('01xz12', '100', 'xz', 1, '1', 'B'),
('01xz13', '100', 'xz', 1, '1', 'B'),
('01xz14', '100', 'xz', 1, '1', 'B'),
('01xz15', '100', 'xz', 1, '1', 'B'),
('01xz16', '100', 'xz', 1, '1', 'B'),
('01xz17', '100', 'xz', 1, '1', 'B'),
('01xz18', '100', 'xz', 1, '1', 'B'),
('01xz19', '100', 'xz', 1, '1', 'B'),
('01xz20', '100', 'xz', 1, '1', 'B'),
('01xz21', '100', 'dx', 1, '1', 'B'),
('01xz22', '100', 'dx', 1, '1', 'B'),
('02tk01', '200', 'tk', 1, '2', 'B'),
('02tk02', '200', 'tk', 1, '2', 'B'),
('02tk03', '200', 'tk', 1, '2', 'B'),
('02tk04', '200', 'tk', 1, '2', 'B'),
('02tk05', '200', 'tk', 1, '2', 'B'),
('02tk06', '200', 'tk', 1, '2', 'B'),
('02tk07', '200', 'tk', 1, '2', 'B'),
('02tk08', '200', 'tk', 1, '2', 'B'),
('02tk09', '200', 'tk', 1, '2', 'B'),
('02tk10', '200', 'tk', 1, '2', 'B'),
('02tk11', '200', 'tk', 1, '2', 'B'),
('02tk12', '200', 'tk', 1, '2', 'B'),
('02tk13', '200', 'tk', 1, '2', 'B'),
('02tk14', '200', 'tk', 1, '2', 'B'),
('02tk15', '200', 'tk', 1, '2', 'B'),
('02tk16', '200', 'tk', 1, '2', 'B'),
('02xz01', '200', 'xz', 1, '2', 'B'),
('02xz02', '200', 'xz', 1, '2', 'B'),
('02xz03', '200', 'xz', 1, '2', 'B'),
('02xz04', '200', 'xz', 1, '2', 'B'),
('02xz05', '200', 'xz', 1, '2', 'B'),
('02xz06', '200', 'xz', 1, '2', 'B'),
('02xz07', '200', 'xz', 1, '2', 'B'),
('02xz08', '200', 'xz', 1, '2', 'B'),
('02xz09', '200', 'xz', 1, '2', 'B'),
('02xz10', '200', 'xz', 1, '2', 'B'),
('02xz11', '200', 'xz', 1, '2', 'B'),
('02xz12', '200', 'xz', 1, '2', 'B'),
('02xz13', '200', 'xz', 1, '2', 'B'),
('02xz14', '200', 'xz', 1, '2', 'B'),
('02xz15', '200', 'xz', 1, '2', 'B'),
('02xz16', '200', 'xz', 1, '2', 'B'),
('02xz17', '200', 'xz', 1, '2', 'B'),
('02xz18', '200', 'xz', 1, '2', 'B'),
('02xz19', '200', 'xz', 1, '2', 'B'),
('02xz20', '200', 'xz', 1, '2', 'B'),
('02xz21', '200', 'xz', 1, '2', 'B'),
('02xz22', '200', 'xz', 1, '2', 'B'),
('02xz23', '200', 'xz', 1, '2', 'B'),
('02xz24', '200', 'xz', 1, '2', 'B'),
('02xz25', '200', 'xz', 1, '2', 'B'),
('02xz26', '200', 'xz', 1, '2', 'B'),
('02xz27', '200', 'xz', 1, '2', 'B'),
('02xz28', '200', 'xz', 1, '2', 'B'),
('02xz29', '200', 'xz', 1, '2', 'B'),
('02xz30', '200', 'xz', 1, '2', 'B'),
('02xz31', '200', 'xz', 1, '2', 'B'),
('02xz32', '200', 'xz', 1, '2', 'B'),
('03tk01', '300', 'tk', 1, '3', 'B'),
('03tk02', '300', 'tk', 1, '3', 'B'),
('03tk03', '300', 'tk', 1, '3', 'B'),
('03tk04', '300', 'tk', 1, '3', 'B'),
('03tk05', '300', 'tk', 1, '3', 'B'),
('03tk06', '300', 'tk', 1, '3', 'B'),
('03tk07', '300', 'tk', 1, '3', 'B'),
('03tk08', '300', 'tk', 1, '3', 'B'),
('03tk09', '300', 'tk', 1, '3', 'B'),
('03tk10', '300', 'tk', 1, '3', 'B'),
('03tk11', '300', 'tk', 1, '3', 'B'),
('03tk12', '300', 'tk', 1, '3', 'B'),
('03tk13', '300', 'tk', 1, '3', 'B'),
('03tk14', '300', 'tk', 1, '3', 'B'),
('03xz01', '300', 'xz', 1, '3', 'B'),
('03xz02', '300', 'xz', 1, '3', 'B'),
('03xz03', '300', 'xz', 1, '3', 'B'),
('03xz04', '300', 'xz', 1, '3', 'B'),
('03xz05', '300', 'xz', 1, '3', 'B'),
('03xz06', '300', 'xz', 1, '3', 'B'),
('03xz07', '300', 'xz', 1, '3', 'B'),
('03xz08', '300', 'xz', 1, '3', 'B'),
('03xz09', '300', 'xz', 1, '3', 'B'),
('03xz10', '300', 'xz', 1, '3', 'B'),
('03xz11', '300', 'xz', 1, '3', 'B'),
('03xz12', '300', 'xz', 1, '3', 'B'),
('03xz13', '300', 'xz', 1, '3', 'B'),
('03xz14', '300', 'xz', 1, '3', 'B'),
('03xz15', '300', 'xz', 1, '3', 'B'),
('03xz16', '300', 'xz', 1, '3', 'B'),
('03xz17', '300', 'xz', 1, '3', 'B'),
('03xz18', '300', 'xz', 1, '3', 'B'),
('03xz19', '300', 'xz', 1, '3', 'B'),
('03xz20', '300', 'xz', 1, '3', 'B'),
('03xz21', '300', 'xz', 1, '3', 'B'),
('03xz22', '300', 'xz', 1, '3', 'B'),
('03xz23', '300', 'xz', 1, '3', 'B'),
('03xz24', '300', 'xz', 1, '3', 'B'),
('03xz25', '300', 'xz', 1, '3', 'B'),
('03xz26', '300', 'xz', 1, '3', 'B'),
('03xz27', '300', 'xz', 1, '3', 'B'),
('03xz28', '300', 'xz', 1, '3', 'B'),
('03xz29', '300', 'xz', 1, '3', 'B'),
('03xz30', '300', 'xz', 1, '3', 'B'),
('03xz31', '300', 'xz', 1, '3', 'B'),
('03xz32', '300', 'xz', 1, '3', 'B'),
('03xz33', '300', 'xz', 1, '3', 'B'),
('03xz34', '300', 'xz', 1, '3', 'B'),
('03xz35', '300', 'xz', 1, '3', 'B'),
('03xz36', '300', 'xz', 1, '3', 'B'),
('03xz37', '300', 'xz', 1, '3', 'B'),
('03xz38', '300', 'xz', 1, '3', 'B'),
('03xz39', '300', 'xz', 1, '3', 'B'),
('04dx01', '400', 'dx', 1, '4', 'B'),
('04dx02', '400', 'dx', 1, '4', 'B'),
('04dx03', '400', 'dx', 1, '4', 'B'),
('04tk01', '400', 'tk', 1, '4', 'B'),
('04tk02', '400', 'tk', 1, '4', 'B'),
('04tk03', '400', 'tk', 1, '4', 'B'),
('04tk04', '400', 'tk', 1, '4', 'B'),
('04tk05', '400', 'tk', 1, '4', 'B'),
('04tk06', '400', 'tk', 1, '4', 'B'),
('04tk07', '400', 'tk', 1, '4', 'B'),
('04tk08', '400', 'tk', 1, '4', 'B'),
('04tk09', '400', 'tk', 1, '4', 'B'),
('04tk10', '400', 'tk', 1, '4', 'B'),
('04tk11', '400', 'tk', 1, '4', 'B'),
('04tk12', '400', 'tk', 1, '4', 'B'),
('04tk13', '400', 'tk', 1, '4', 'B'),
('04xz01', '400', 'xz', 1, '4', 'B'),
('04xz02', '400', 'xz', 1, '4', 'B'),
('04xz03', '400', 'xz', 1, '4', 'B'),
('04xz04', '400', 'xz', 1, '4', 'B'),
('04xz05', '400', 'xz', 1, '4', 'B'),
('04xz06', '400', 'xz', 1, '4', 'B'),
('04xz07', '400', 'xz', 1, '4', 'B'),
('04xz08', '400', 'xz', 1, '4', 'B'),
('04xz09', '400', 'xz', 1, '4', 'B'),
('04xz10', '400', 'xz', 1, '4', 'B'),
('04xz11', '400', 'xz', 1, '4', 'B'),
('04xz12', '400', 'xz', 1, '4', 'B'),
('04xz13', '400', 'xz', 1, '4', 'B'),
('04xz14', '400', 'xz', 1, '4', 'B'),
('04xz15', '400', 'xz', 1, '4', 'B'),
('04xz16', '400', 'xz', 1, '4', 'B'),
('04xz17', '400', 'xz', 1, '4', 'B'),
('04xz18', '400', 'xz', 1, '4', 'B'),
('04xz19', '400', 'xz', 1, '4', 'B'),
('04xz20', '400', 'xz', 1, '4', 'B'),
('04xz21', '400', 'xz', 1, '4', 'B'),
('04xz22', '400', 'xz', 1, '4', 'B'),
('04xz23', '400', 'xz', 1, '4', 'B'),
('04xz24', '400', 'xz', 1, '4', 'B'),
('04xz25', '400', 'xz', 1, '4', 'B'),
('04xz26', '400', 'xz', 1, '4', 'B'),
('04xz27', '400', 'xz', 1, '4', 'B'),
('04xz28', '400', 'xz', 1, '4', 'B'),
('04xz29', '400', 'xz', 1, '4', 'B'),
('04xz30', '400', 'xz', 1, '4', 'B'),
('04xz31', '400', 'xz', 1, '4', 'B'),
('04xz32', '400', 'xz', 1, '4', 'B'),
('05dx01', '500', 'dx', 1, '5', 'B'),
('05dx02', '500', 'dx', 1, '5', 'B'),
('05tk01', '500', 'tk', 1, '5', 'B'),
('05tk02', '500', 'tk', 1, '5', 'B'),
('05tk03', '500', 'tk', 1, '5', 'B'),
('05tk04', '500', 'tk', 1, '5', 'B'),
('05tk05', '500', 'tk', 1, '5', 'B'),
('05tk06', '500', 'tk', 1, '5', 'B'),
('05tk07', '500', 'tk', 1, '5', 'B'),
('05tk08', '500', 'tk', 1, '5', 'B'),
('05tk09', '500', 'tk', 1, '5', 'B'),
('05xz01', '500', 'xz', 1, '5', 'B'),
('05xz02', '500', 'xz', 1, '5', 'B'),
('05xz03', '500', 'xz', 1, '5', 'B'),
('05xz04', '500', 'xz', 1, '5', 'B'),
('05xz05', '500', 'xz', 1, '5', 'B'),
('05xz06', '500', 'xz', 1, '5', 'B'),
('05xz07', '500', 'xz', 1, '5', 'B'),
('05xz08', '500', 'xz', 1, '5', 'B'),
('05xz09', '500', 'xz', 1, '5', 'B'),
('05xz10', '500', 'xz', 1, '5', 'B'),
('05xz11', '500', 'xz', 1, '5', 'B'),
('05xz12', '500', 'xz', 1, '5', 'B'),
('05xz13', '500', 'xz', 1, '5', 'B'),
('05xz14', '500', 'xz', 1, '5', 'B'),
('05xz15', '500', 'xz', 1, '5', 'B'),
('05xz16', '500', 'xz', 1, '5', 'B'),
('05xz17', '500', 'xz', 1, '5', 'B'),
('05xz18', '500', 'xz', 1, '5', 'B'),
('05xz19', '500', 'xz', 1, '5', 'B'),
('05xz20', '500', 'xz', 1, '5', 'B'),
('05xz21', '500', 'xz', 1, '5', 'B'),
('05xz22', '500', 'xz', 1, '5', 'B'),
('05xz23', '500', 'xz', 1, '5', 'B'),
('05xz24', '500', 'xz', 1, '5', 'B'),
('05xz25', '500', 'xz', 1, '5', 'B'),
('05xz26', '500', 'xz', 1, '5', 'B'),
('05xz27', '500', 'xz', 1, '5', 'B'),
('05xz28', '500', 'xz', 1, '5', 'B'),
('05xz29', '500', 'xz', 1, '5', 'B'),
('05xz30', '500', 'xz', 1, '5', 'B'),
('05xz31', '500', 'xz', 1, '5', 'B'),
('05xz32', '500', 'xz', 1, '5', 'B'),
('05xz33', '500', 'xz', 1, '5', 'B'),
('05xz34', '500', 'xz', 1, '5', 'B'),
('05xz35', '500', 'xz', 1, '5', 'B'),
('06tk01', '600', 'tk', 1, '6', 'B'),
('06tk02', '600', 'tk', 1, '6', 'B'),
('06tk03', '600', 'tk', 1, '6', 'B'),
('06tk04', '600', 'tk', 1, '6', 'B'),
('06tk05', '600', 'tk', 1, '6', 'B'),
('06xz01', '600', 'xz', 1, '6', 'B'),
('06xz02', '600', 'xz', 1, '6', 'B'),
('06xz03', '600', 'xz', 1, '6', 'B'),
('06xz04', '600', 'xz', 1, '6', 'B'),
('06xz05', '600', 'xz', 1, '6', 'B'),
('06xz06', '600', 'xz', 1, '6', 'B'),
('06xz07', '600', 'xz', 1, '6', 'B'),
('06xz08', '600', 'xz', 1, '6', 'B'),
('06xz09', '600', 'xz', 1, '6', 'B'),
('06xz10', '600', 'xz', 1, '6', 'B'),
('06xz11', '600', 'xz', 1, '6', 'B'),
('06xz12', '600', 'xz', 1, '6', 'B'),
('06xz13', '600', 'xz', 1, '6', 'B'),
('06xz14', '600', 'xz', 1, '6', 'B'),
('06xz15', '600', 'xz', 1, '6', 'B'),
('06xz16', '600', 'xz', 1, '6', 'B'),
('06xz17', '600', 'xz', 1, '6', 'B'),
('06xz18', '600', 'xz', 1, '6', 'B'),
('06xz19', '600', 'xz', 1, '6', 'B'),
('06xz20', '600', 'xz', 1, '6', 'B'),
('Ceno', 'Ccno', 'Cename', 0, 'Cstyle', 'Cstag');

-- --------------------------------------------------------

--
-- 表的结构 `CexerciseAnswerForstudent`
--

CREATE TABLE IF NOT EXISTS `CexerciseAnswerForstudent` (
  `Ceano` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `Ceno` varchar(50) NOT NULL COMMENT '题目号(题库中)',
  `Chno` int(11) NOT NULL COMMENT '所属考试号',
  `Sno` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT '学生号',
  `Canswer` varchar(200) DEFAULT NULL COMMENT '答案',
  `Cscore` int(6) NOT NULL DEFAULT '0' COMMENT '答案得分',
  `Cnum` smallint(6) NOT NULL COMMENT '题目号(试卷中)',
  PRIMARY KEY (`Ceano`),
  KEY `Ceno` (`Ceno`),
  KEY `Chno` (`Chno`),
  KEY `Sno` (`Sno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- 转存表中的数据 `CexerciseAnswerForstudent`
--

INSERT INTO `CexerciseAnswerForstudent` (`Ceano`, `Ceno`, `Chno`, `Sno`, `Canswer`, `Cscore`, `Cnum`) VALUES
(93, '01xz01', 47, '12212939', 'A', 0, 1),
(94, '01xz02', 47, '12212939', 'A', 0, 2),
(95, '01xz03', 47, '12212939', 'A', 0, 3),
(96, '01xz04', 47, '12212939', 'A', 1, 4),
(97, '01xz05', 47, '12212939', 'A', 0, 5),
(98, '01xz06', 47, '12212939', 'A', 1, 6),
(99, '01xz07', 47, '12212939', 'A', 0, 7),
(100, '01xz09', 47, '12212939', 'A', 1, 8),
(101, '01xz10', 47, '12212939', 'A', 0, 9),
(102, '01xz11', 47, '12212939', 'A', 0, 10),
(103, '01xz12', 47, '12212939', 'A', 0, 11),
(104, '01xz13', 47, '12212939', 'A', 0, 12),
(105, '01xz14', 47, '12212939', 'A', 0, 13),
(106, '01xz15', 47, '12212939', 'A', 0, 14),
(107, '01xz16', 47, '12212939', 'A', 0, 15),
(108, '01xz17', 47, '12212939', 'A', 0, 16),
(109, '01xz18', 47, '12212939', 'A', 0, 17),
(110, '01xz19', 47, '12212939', 'A', 0, 18),
(111, '01xz20', 47, '12212939', 'A', 0, 19),
(112, '01xz08', 47, '12212939', '%', 0, 20),
(113, '01xz21', 47, '12212939', '%', 0, 21),
(114, '01xz22', 47, '12212939', '%', 0, 22);

-- --------------------------------------------------------

--
-- 表的结构 `Chapter`
--

CREATE TABLE IF NOT EXISTS `Chapter` (
  `Cno` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Cname` varchar(30) NOT NULL COMMENT '章节名称',
  PRIMARY KEY (`Cno`),
  UNIQUE KEY `Cname` (`Cname`),
  UNIQUE KEY `Cno` (`Cno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Chapter`
--

INSERT INTO `Chapter` (`Cno`, `Cname`) VALUES
('100', '第一章'),
('300', '第三章'),
('200', '第二章'),
('500', '第五章'),
('600', '第六章'),
('400', '第四章');

-- --------------------------------------------------------

--
-- 表的结构 `ChooseProblem`
--

CREATE TABLE IF NOT EXISTS `ChooseProblem` (
  `CPid` varchar(50) NOT NULL COMMENT '选择题ID',
  `CPcontent` varchar(1000) NOT NULL COMMENT '选择题题干',
  `CPanswer` varchar(20) NOT NULL COMMENT '选择题答案',
  `CPnumber` int(11) NOT NULL COMMENT '选项个数',
  `CPclass` varchar(20) NOT NULL COMMENT '选择题类型',
  PRIMARY KEY (`CPid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='选择题表';

--
-- 转存表中的数据 `ChooseProblem`
--

INSERT INTO `ChooseProblem` (`CPid`, `CPcontent`, `CPanswer`, `CPnumber`, `CPclass`) VALUES
('01xz01', '以下不属于Access 2010对象的是(    )。%A模块%B窗体%C报表%D工作表', 'D', 4, 'xz'),
('01xz02', '退出Access 2010数据库的方法不包括(    )。%A单击“文件菜单”，在展开的菜单中单击“退出”按钮%B单击Access 2010应用程序窗口上右上角的“关闭”按钮%C按Ctrl+ Break组合键%D按Alt+ F4组合键', 'C', 4, 'xz'),
('01xz03', 'Aceess 2010中主要的新界面元素不包括(    )。%A快速访问工具栏%B数据库窗口%C导航窗格%D选项卡', 'B', 4, 'xz'),
('01xz04', 'Access 2010数据库模板包括本地模板和(    )。%A网上模板%B自定义模板%C演示模板%D参照模板', 'A', 4, 'xz'),
('01xz05', '新数据库的默认文件名是(    )。%A文档1.accdb%BDatabasel.accdb%C工作表1.accdb%D工作簿1.accdb', 'B', 4, 'xz'),
('01xz06', 'Aceess 2010的6大对象中，用于存储数据的数据库对象是(    )。%A表%B查询%C窗体%D报表', 'A', 4, 'xz'),
('01xz07', '在数据库的6大对象中，用于和用户进行交互的数据库对象是(    )。%A表%B查询%C窗体%D报表', 'C', 4, 'xz'),
('01xz08', '隐藏导航窗格的方法是(    )。%A单击导航窗格右上角的按钮%B按Alt键%C按F11键%D按Shift键', '%A%C', 4, 'dx'),
('01xz09', '在Access 2010中，随着打开数据库对象的不同而不同的操作区域称为(    )。%A命令选项卡%B上下文命令选项卡%C导航窗格%D工具栏', 'A', 4, 'xz'),
('01xz10', '除了新创建的空白数据库之外，Access数据库中至少包含一个(    )对象。%A查询%B窗体%C报表%D表', 'D', 4, 'xz'),
('01xz11', '(    )是设置Access 2010操作环境的主要工具，它融合了早期版本的“工具”选项和“启动”选项的设置功能。%A导航窗格%B任务栏%CAccess选项%D选项卡', 'C', 4, 'xz'),
('01xz12', '选定数据库对象设计视图的按键是(    )。%AEnter%BShift+Enter%CCtrl+Shift+Enter%DCtrl+Enter', 'D', 4, 'xz'),
('01xz13', 'Access 2010停止了对数据访问页的支持，转而大大增强的协同工作是通过(    )来实现的。%A数据选项卡%BSharePoint网站%CMicrosoft在线帮助%DOutlook新闻组', 'B', 4, 'xz'),
('01xz14', 'Access 2010的默认数据库格式是(    )。%AMDB%BACCDB%CACCDE%DMDE', 'B', 4, 'xz'),
('01xz15', '在Access 2010数据库中，任何事物都被称为(    )。%A方法%B对象%C属性%D事件', 'B', 4, 'xz'),
('01xz16', 'Access 2010数据库文件的默认的扩展名是(    )。%Adoc%Bdot%Cxls%Daccdb', 'D', 4, 'xz'),
('01xz17', '在Access 2010中，打开某数据库有(    )种打开方式。%A2%B3%C4%D5', 'C', 4, 'xz'),
('01xz18', 'Access 2010数据库类型是(    )。%A层次数据库%B关系数据库%C网状数据库%D圆状数据库', 'B', 4, 'xz'),
('01xz19', 'Access 2010是一个(    )系统。%A人事管理%B数据库%C数据库管理%D财务管理', 'C', 4, 'xz'),
('01xz20', '在Access 2010中，表、查询、窗体、报表、宏、模块等六个数据库对象都(    )独立数据库文件。%A可存储为%B不可存储为%C可部分存储为%D可部分不可存储为', 'B', 4, 'xz'),
('01xz21', '在Access 2010窗口中，“文件”选项卡中的命令包括(    )。%A打开%B编辑%C新建%D格式', '%A%C', 4, 'dx'),
('01xz22', '在Access 2010窗口中，“外部数据”选项卡中包括(    )命令组。%A导入并链接%B编辑%C导出%D收集数据', '%A%C%D', 4, 'dx'),
('02xz01', '在Access表中，可以定义3种主键，它们分别是(    )。%A单字段、双字段和多字段%B单字段、双字段和自动编号%C单字段、多字段和自动编号%D双字段、多字段和自动编号', 'C', 4, 'xz'),
('02xz02', '假设表A与表B建立了“多对一”关系，下述说法中正确的是(    )。%A表B中的一条记录能与表A中的多个记录匹配%B表A中的一条记录能与表B中的多个记录匹配%C表B中的一个字段能与表A中的多个字段匹配%D表A中的一个字段能与表B中的多个字段匹配', 'A', 4, 'xz'),
('02xz03', '在以下关于“输入掩码”的叙述中，错误的是(    )。%A定义字段的输入掩码时，既可以使用输入掩码向导，也可以直接使用字符%B定义字段的输入掩码是为了设置密码%C输入掩码中的字符“0”表示可以输入0 -9中的一个数字%D直接使用字符定义输入掩码时，可以根据需要将字符组合起来', 'B', 4, 'xz'),
('02xz04', 'Access提供的数据类型中不包括(    )。%A备注%B文字%C货币%D日期／时间', 'B', 4, 'xz'),
('02xz05', '在数据表视图中，要使某些字段不能移动显示的位置，可以使用的方法是(    )。%A排序%B筛选%C隐藏%D冻结', 'D', 4, 'xz'),
('02xz06', '若“文本”类型的字段大小设置为20，则最多可输入的汉字数和英文字符数分别是(    )。%A10,10%B10 ,20%C20,20%D20.4', 'C', 4, 'xz'),
('02xz07', '必须输入数字0 -9的输入掩码是(    )。%A0%BC%CA%D9', 'A', 4, 'xz'),
('02xz08', '设置查找内容为“b[! Eiu]t”，则满足条件的字符串是(    )。%Abat%Bbet%Cbit%Dbut', 'A', 4, 'xz'),
('02xz09', '(    )是Access 2010新增的字段类型。%AOLE对象%B超链接%C附件%D备注', 'C', 4, 'xz'),
('02xz10', '如果要限制输入数据值的范围，可以设置的字段属性是(    )。%A字段大小%B默认值%C输入掩码%D有效性规则', 'D', 4, 'xz'),
('02xz11', '数据表最明显的特性，也是关系型数据库数据存储的特征是(    )。%A数据按主题分类存储%B数据按行列存储%C数据存储在表中%D数据只能是文字信息', 'C', 4, 'xz'),
('02xz12', '下面(    )不是使用关系的好处。%A一致性%B调高效率%C易于理解%D美化数据库', 'D', 4, 'xz'),
('02xz13', '对数据表数据进行修改，主要是在数据表的(    )视图中进行的。%A数据表%B数据透视表%C设计%D数据透视图', 'A', 4, 'xz'),
('02xz14', 'Access 2010的表关系有3种，即一对一、一对多和多对多，其中需要中间表作为关系桥梁的是(    )关系。%A一对一%B一对多%C多对多%D各种关系都有', 'C', 4, 'xz'),
('02xz15', '表“设计视图”包括两个区域：字段输入区和(    )。%A格式输入区%B数据输入区%C字段属性区%D页输入区', 'C', 4, 'xz'),
('02xz16', '在Access 2010中，数据表有两种常用的视图：设计视图和(    )。%A报表视图%B宏视图%C数据表视图%D页视图', 'C', 4, 'xz'),
('02xz17', '在Access 2010中，“开始”选项卡上的“排序与筛选”组中用于筛选的按钮包括“筛选器”、“选择”和(    )。%A升序%B低级%C高级%D降序', 'C', 4, 'xz'),
('02xz18', 'Access 2010中有两种数据类型：文本型和(    )型，它们可以保存文本或文本和数字组合的数据。%A是/否%B备注%C数字%D日期／时间', 'B', 4, 'xz'),
('02xz19', '输入掩码是给字段输入数据时设置的(    )。%A初值%B当前值%C输出格式%D输入格式', 'D', 4, 'xz'),
('02xz20', '子表的概念是相对主表而言的，它是嵌在(    )中的表。%A从表%B主表%C子表%D大表', 'B', 4, 'xz'),
('02xz21', '关于表的说法正确的是(    )。%A表是数据库%B表是记录的集合，每条记录又可划分成多个字段%C在表中可以直接显示图形记录%D在表中的数据中不可以建立超级链接', 'B', 4, 'xz'),
('02xz22', '在Access 2010中表和数据库的关系是(    )。%A一个数据库可以包含多个表%B一个表只能包含两个数据库%C一个表可以包含多个数据库%D一个数据库只能包含一个表', 'A', 4, 'xz'),
('02xz23', '下面对数据表的叙述有错误的是(    )。%A数据表是Access 2010数据库中的重要对象之一%B表的“设计视图”的主要工作是设计表的结构%C表的“数据表视图”只用于显示数据%D可以将其他数据库的表导入当前数据库中', 'C', 4, 'xz'),
('02xz24', '1在Access 2010的数据类型中，不能建立索引的数据类型是(    )。%A文本型%B备注型%COLE对象%D超链接', 'C', 4, 'xz'),
('02xz25', '1在数据表视图中，不可以(    )。%A设置表的主键%B修改字段的名称%C删除一个字段%D删除一条记录', 'A', 4, 'xz'),
('02xz26', '1将表中的字段定义为(    )，其作用可使字段中的每一个记录都必须是唯一的。%A索引%B主键%C必填字段%D有效性规则', 'B', 4, 'xz'),
('02xz27', '定义字段的默认值是指(    )。%A不得使字段为空%B不允许字段的值超出某个范围%C在未输入数值之前，系统自动提供数值%D系统自动把小写字母转换为大写字母', 'C', 4, 'xz'),
('02xz28', '在下列数据类型中，可以设置“字段大小”属性的是(    )。%A备注%B文本%C日期/时间%D货币', 'B', 4, 'xz'),
('02xz29', '自动编号类型的字段，其字段大小可以是(    )。%A字节%B整型%C长整型%D单精度型', 'C', 4, 'xz'),
('02xz30', '关于主关键字的说法正确的是(    )。%A作为主关键字的字段，它的数据能够重复%B主关键字字段中不许有重复值和空值%C在每个表中，都必须设置主关键字%D主关键字是一个字段', 'B', 4, 'xz'),
('02xz31', '对于一个数据类型的字段，如果想对该字段数据输入范围添加一定的限制，可以通过对字段属性的设定来完成。%A字段大小%B格式%C有效性规则%D有效性文本', 'C', 4, 'xz'),
('02xz32', '设置主关键字是在(    )中实现的。%A表设计视图%B表的数据表视图%C查询设计视图%D报表的设计视图', 'A', 4, 'xz'),
('03xz01', 'Acccss查询的“设计视图”分为两个部分，上部是字段列表区，下部是(    )区。%A数据表设计网格%B查询设计网格%C报表设计网格%D窗体设计网格', 'B', 4, 'xz'),
('03xz02', 'Acccss查询的结果总是与数据源中的数据保持(    )。%A不一致%B同步%C无关%D不同步', 'B', 4, 'xz'),
('03xz03', 'ACCESS查询的数据源可以来自(    )。%A表%B查询%C表和查询%D报表', 'C', 4, 'xz'),
('03xz04', 'Access数据库系统提供四种查询向导，分别是(    )、交叉表查询向导、查找重复项查询向导、查找不匹配项查询向导。%A字段查询向导%B简单查询向导%C记录查询向导%D数据查询向导', 'B', 4, 'xz'),
('03xz05', 'Access支持的查询类型有(    )。%A选择查询、交叉表查询、参数查询、SQL查询和操作查询%B基本查询、选择查询、参数查询、SQL查询和操作查询%C复杂查询、简单查询、交叉表查询、参数查询和操作查询%D选择查询、统计查询、参数查询、SQL查询和操作查询', 'A', 4, 'xz'),
('03xz06', 'SQL语句中的DROP关键字的功能是从数据库中(    )。%A修改表%B删除表%C插入表%D新建表', 'B', 4, 'xz'),
('03xz07', '不属于Access查询的是(    )。%A更新查询%B交叉表查询%CSQL查询%D连接查询', 'D', 4, 'xz'),
('03xz08', '操作查询包括(    )。%A生成表查询、更新查询、删除查询和交叉表查询%B生成表查询、删除查询、更新查询和追加查询%C选择查询、普通查询、更新查询和追加查询%D选择查询、参数查询、更新查询和生成表查询', 'B', 4, 'xz'),
('03xz09', '操作查询不包括(    )。%A生成表查询%B删除查询%C追加查询%D选择查询', 'D', 4, 'xz'),
('03xz10', '查找“姓名”字段中姓名的第二字是“宏”字的历有记录的准则是(    )。%ALike”*宏”%BLike”?宏”%CLike”?宏?”%DLike”宏*”', 'D', 4, 'xz'),
('03xz11', '创建ACCESS查询可以(    )。%A利用查询向导%B使用查询“设计”视图%C使用SQL查询%D使用以上3种方法', 'D', 4, 'xz'),
('03xz12', '创建交叉表查询时，在“交叉表”行上有且只能有一个的是(    )。%A行标题和列标题%B行标题和值%C行标题、列标题和值%D列标题和值', 'D', 4, 'xz'),
('03xz13', '关于删除查询，叙述正确的是(    )。%A每次只能删除一条记录%B每次只能删除单个表中的记录%C删除过的记录能用“撤销”命令恢复%D每次删除整个记录，并非是指定字段中的数据', 'D', 4, 'xz'),
('03xz14', '假设某表中有一个“姓名”字段，查找姓边的记录的准则是(    )。%ANot”边”%BLike”边”%CLef([姓名]，1)=”边”%D”边”', 'C', 4, 'xz'),
('03xz15', '假设某数据表中有一个“姓名”字段，查找姓“王”的记录的条件是(    )。%ANOT”王*”%BLIKE”王”%CLIKE”王＊”%D”王”', 'C', 4, 'xz'),
('03xz16', '将表A的记录复制到表B中，且不删除表B中的记录，可以使用的查询是(    )。%A删除查询%B生成表查询%C追加查询%D交叉表查询', 'C', 4, 'xz'),
('03xz17', '某工厂数据库中使用表“产品”记录生产信息，该表包括小组编号、日期、产量等字段，每个记录保存了一个小组一天的产量等信息。现需要统计每个小组在2008年9月份的总产量，则使用的SQL命令是(    )。%ASELECT小组编号,SUM(产量)  AS 总产量 FROM 产品 WHERE日期=#2008-09#  GROUPBY小组编号%BSELECT小组编号,SUM(产量) AS 总产量 FROM 产品 WHERE日期>=#2008-09-01# AND 日期<=#2008-09-30#  GROUPBY日期%CSELECT小组编号, SUM(产量) AS总产量 FROM 产品 WHERE日期>=#2008-09-01# AND 日期<#2008-10-01#  GROUPBY小组编号%DSELECT 小组编号,SUM(产量) AS 总产量 FROM 产品 WHERE日期=9月GROUPBY小组编号,日期', 'C', 4, 'xz'),
('03xz18', '生成表查询不能应用于(    )。%A创建表的备份副本%B快速批量追加数据%C提高基于表查询或SQL语句的窗体和报表的性能%D创建包含旧记录的历史表', 'D', 4, 'xz'),
('03xz19', '数据表中有一个“地址”字段，查找地址最后两个字为“2楼”的记录准则是(    )。%ARight([地址],2)=”2楼”%BRight([地址],3)=”2楼”%CRight(“地址”,2)=”2楼”%DRight(“地址”,3)=”2楼”', 'A', 4, 'xz'),
('03xz20', '数据表中有一个“姓名”字段，查找姓名为“刘星”或”李四”的记录的准则是(    )。%ALike（”刘星”，”李四”）%BLike（”刘星和李四”）%CIn（”刘星和李四”）%DIn（”刘星”，”李四”）', 'D', 4, 'xz'),
('03xz21', '特殊运算符“Is Null”用于指定一个字段为(    )。%A0%BB。空格%C空值%D假', 'C', 4, 'xz'),
('03xz22', '条件中“Between 20 and 100”的意思是(    )。%A数值20到100之间（包含20和100）的数字%B数值20和100这两个数字%C数值20和100这两个数字之外的数字%D数值20和100包含这两个数字，并且除此之外的数字', 'A', 4, 'xz'),
('03xz23', '以下不属于Access查询的是(    )。Ｄ%A更新查询%B交叉表查询%CSQL查询%D连接查询', 'D', 4, 'xz'),
('03xz24', '以下不属于SQL特定查询的是(    )。%A交叉表查询%B联合查询%C子查询%D传递查询', 'A', 4, 'xz'),
('03xz25', '以下不属于操作查询的是(    )。%A交叉表查询%B更新查询%C删除查询%D生成表查询', 'A', 4, 'xz'),
('03xz26', '以下关于查询的叙述正确的是(    )。%A只能根据数据表创建查询%B只能根据已建查询创建查询%C可以根据数据表和已建查询创建查询%D不能根据已建查询创建查询', 'C', 4, 'xz'),
('03xz27', '以下关于查询的叙述中正确的是(    )。%A只能根据表创有查询%B只能根据已有查询创建查询%C可以根据表和已建查询创建查询%D不能根据已有查询创建查询', 'C', 4, 'xz'),
('03xz28', '以下叙述中，错误的是(    )。%A查询是从数据库的表中筛选出符合条件的记录，构成一个新的数据集合%B创建复杂的查询也可以使用查询向导%C如果查询是根据现有表中“身份证号码”字段检索1998年出生的人员信息，则可以根    据条件行中的表达式Mid([身份证号码],7,4)=”1998”判断该查询类型是参数查询%D可以使用函数、逻辑运算符、关系运算符创建复杂的查询', 'D', 4, 'xz'),
('03xz29', '以下叙述中，正确的是(    )。%A在数据较多、较复杂的情况下使用筛选比使用查询的效果好%B查询只从一个表中选择数据，而筛选可以从多个表中获取数据%C通过筛选形成的数据表，可以作为查询的数据来源%D查询可将结果保存起来，供下次使用', 'D', 4, 'xz'),
('03xz30', '用表“学生名单”创建新表“学生名单2”，所使用的查询方式是(    )。%A删除查询%B生成表查询%C追加查询%D交叉表查询', 'B', 4, 'xz'),
('03xz31', '有一“人事档案”表，该表中有职工编号、姓名、性别、出生日期和职位五个字段的信息，对所有的职工先按性别的升序排序，在性别相同的情况下再按出生日期的降序排序。能完成这一功能的SQL语句是(    )。%ASELECT * FROM人事档案ORDER BY性别 ASC  出生日期 DESC%BSELECT * FROM人事档案ORDER BY性别 ASC  and 出生日期 DESC%CSELECT * FROM人事档案ORDER BY性别 ASC，出生日期 DESC%DSELECT * FROM人事档案ORDER BY性别，出生日期', 'C', 4, 'xz'),
('03xz32', '有一“人事档案”表，该表中有职工编号、姓名、性别、年龄和职位五个字段的信息，现要求显示所有职位不是部门经理的职工的信息。能完成该功能的SQL语句是(    )。%ASELECT * FROM人事档案 WHERE  not ”部门经理”%BSELECT * FROM人事档案 WHERE 职位no t”部门经理”%CSELECT * FROM人事档案 WHERE  not职位=”部门经理”%DSELECT * FROM人事档案 WHERE 职位=”部门经理”', 'C', 4, 'xz'),
('03xz33', '有一“人事档案”表，该表中有职工编号、姓名、性别、年龄和职位五个字段的信息，要查询所有年龄在50岁以上（含50岁）的女职工，且只显示其职工编号、姓名、年龄三个字段的信息，应使用_(    )SQL语句。%ASELECT 职工编号,姓名,年龄 FROM 人事档案 WHERE年龄>=50  性别=”女”%BSELECT 职工编号,姓名,年龄 FROM人事档案 WHERE年龄>=50 and 性别=”女” and 职位=”职工”%CSELECT职工编号,姓名,年龄 FROM 人事档案  WHERE年龄>=50 and 性别=”女”%DSELECT职工编号,姓名,年龄 FROM 人事档案  WHERE年龄>=50，性别=”女”', 'C', 4, 'xz'),
('03xz34', '有一“人事档案”表，该表中有职工编号、姓名、性别、年龄和职位五个字段的信息，要将所有职工的年龄增加1，应用(    )SQL语句。%AUPDATE人事档案 年龄=年龄+1%BUPDATE人事档案 SET年龄WITH年龄+1%CUPDATE人事档案 SET年龄=年龄+1%DUPDATE人事档案 LET年龄=年龄+l', 'C', 4, 'xz'),
('03xz35', '在Acccss查询准则中，日期值要用(    )括起来。%A百分号%B$%C#%D&', 'C', 4, 'xz'),
('03xz36', '在Acccss中，参数查询是利用“输人参数值”(    )来提示用户输入条件的查询。%A状态栏%B对话框%C工具栏%D菜单栏', 'B', 4, 'xz'),
('03xz37', '在Acccss中，可以对数据表中原有的数据内容进行修改的查询类型是(    )。%A选择查询%B交叉表查询%C操作查询%D参数查询', 'C', 4, 'xz'),
('03xz38', '在查询中对一个字段指定的多个条件的取值之间满足(    )关系。%AAnd%BOr%CNot%DLike', 'B', 4, 'xz'),
('03xz39', '在使用向导创建交叉表查询时，用户至少需要指定的字段个数为(    )。%A1%B2%C3%D4', 'C', 4, 'xz'),
('04dx01', '将窗体用做数据输入窗体，输入窗体的最基本功能包括(    )。%A打印数据%B编辑数据%C输入数据%D显示数据', '%B%C%D', 4, 'dx'),
('04dx02', '可以利用窗体对数据库的操作是(    )。%A添加%B查询%C删除%D更新', '%A%B%C%D', 4, 'dx'),
('04dx03', '下面关于列表框和组合框的叙述，错误的是(    )。%A列表框和组合框可以包含一列或几列数据%B可以在列表框中输入新值，而组合框不能%C可以在组合框中输入新值，而列表框不能%D在列表框和组合框中均可以输入新值', '%B%D', 4, 'dx'),
('04xz01', '“特殊效果”属性值用于设定控件的显示特效，下列属于“特殊效果”属性值的是(    )。\n①“平面”、②“颜色”、③“凸起”、④“蚀刻”、⑤“透明”、⑥“阴影”、⑦“凹陷”、⑧“凿痕”、⑨“倾斜”%A①②③④⑤⑥%B①③④⑤⑥⑦%C①④⑥⑦⑧⑨%D①③④⑥⑦⑧', 'D', 4, 'xz'),
('04xz02', 'Access2010中在同一个窗体上可以将数据源的所有记录以单一窗体和数据表两种方式显示的窗体是(    )。%A多项目窗体%B数据表窗体%C分割窗体%D单个窗体', 'C', 4, 'xz'),
('04xz03', '不是窗体“格式”属性的选项是(    )。%A标题%B默认视图%C自动调整%D前景色', 'D', 4, 'xz'),
('04xz04', '不属于Access窗体的视图是(    )。%A设计视图%B窗体视图%C布局试图%D数据表视图', 'D', 4, 'xz'),
('04xz05', '窗口事件是指操作窗口时所引发的事件，下列不属于窗口事件的是(    )。%A加载%B打开%C关闭%D确定', 'D', 4, 'xz'),
('04xz06', '窗体包含窗体页眉/页脚节、页面页眉/页脚节和(    )。%A子体节%B父体节%C从体节%D主体节', 'D', 4, 'xz'),
('04xz07', '窗体的记录源可以是表或(    )。%A报表%B宏%C查询%D模块', 'C', 4, 'xz'),
('04xz08', '窗体上的控件分为3种类型：绑定控件、未绑定控件和(    )。%A查询控件%B报表控件%C计算控件%D模块控件', 'C', 4, 'xz'),
('04xz09', '窗体是Access数据库中的一个对象，通过窗体用户可以完成下列哪些功能？(    )。\n①输入数据  ②编辑数据  ③存储数据  ④以行、列形式显示数据    ⑤显示和查询表中的数据  ⑥导出数据%A①②③%B①②④%C①②⑤%D①②⑥', 'A', 4, 'xz'),
('04xz10', '窗体最多有5个组成节，其中必须存在的是(    )。%A页面页眉%B页面页脚%C主体%D窗体页眉', 'C', 4, 'xz'),
('04xz11', '当窗体中的内容较多而无法在一页中显示时，可以分页显示，使用的控件是(    )。%A按钮%B组合框%C选项卡控件%D选项组', 'C', 4, 'xz'),
('04xz12', '当需要将一些切换按钮、选项按钮或复选框组合起来共同工作时，需要使用的控件是(    )。%A列表框%B复选框%C选项组%D组合框', 'C', 4, 'xz'),
('04xz13', '既可以显示窗体的运行状态，又可以修改窗体控件的视图是(    )。%A窗体视图%B设计视图%C数据表视图%D布局视图', 'C', 4, 'xz'),
('04xz14', '将不需要的记录隐藏起来，只显示想要看的记录，使用的是Access中对表或查询或窗体中的记录的(    )功能。%A输入%B编辑%C计算%D筛选', 'D', 4, 'xz'),
('04xz15', '为窗体上的控件设置Tab键的顺序．应选择“属性表”窗口中的(    )。%A格式选项卡%B数据选项卡%C事件选项卡%D其他选项卡', 'D', 4, 'xz'),
('04xz16', '下列关于窗体的说法，正确的是(    )。%A在窗体视图中，可以对窗体进行结构的修改%B在窗体设计视图中，可以对窗体进行结构的修改%C在窗体设计视图中，可以进行数据记录的浏览%D在窗体设计视图中，可以进行数据记录的添加', 'B', 4, 'xz'),
('04xz17', '下列关于控件属性的说法，正确的是(    )。%A在某控件的“属性表”窗口中，可以重新设置该控件的属性值%B所有对象都具有同样的属性%C控件的属性只能在设计时设置，不能在运行时修改%D控件的每一个属性都具有同样的默认值', 'A', 4, 'xz'),
('04xz18', '下面关于窗体的说法，错误的是(    )。%A在窗体中可以含有—个或几个子窗体%B子窗体是窗体中的窗体，基本窗体称为主窗体%C子窗体的数据来源可以来自表或查询%D一个窗体中只能含有一个子窗体', 'D', 4, 'xz'),
('04xz19', '要改变标签控件的显示内容，应该修改的属性是(    )。%A名称%B数据来源%C行来源%D标题', 'D', 4, 'xz'),
('04xz20', '要改变窗体的记录源，应该修改窗体属性中的(    )属性。%A格式%B数据%C事件%D其他', 'B', 4, 'xz'),
('04xz21', '以下不属于窗体功能的是(    )。%A显示与编辑数据%B编辑查询规则%C反馈信息%D控制程序流程', 'B', 4, 'xz'),
('04xz22', '以下陈述中，错误的是(    )。%A文本框控件可以设置为绑定型控件、非绑定型控件或计算型控件%B列表框既可以从列表中选值又可以输入新值%C组合框既可以从列表中选值又可以输入新值%D窗体的数据源可以来自表或查询', 'B', 4, 'xz'),
('04xz23', '以下陈述中，错误的是(    )。D%A数据透视表可以有2个列字段%B数据透视表可以有4个行字段%C数据透视表可以有1个筛选字段%D数据透视表可以有0个汇总字段', 'B', 4, 'xz'),
('04xz24', '以下控制中不可以和选项组一起组合使用的是(    )。%A命令按钮%B切换按钮%C复选框%D选项按钮', 'A', 4, 'xz'),
('04xz25', '以下控制中不可以设置为绑定型控件的是(    )。%A标签%B文本框%C选项组%D列表框', 'A', 4, 'xz'),
('04xz26', '用于创建窗体或修改窗体的是(    )。%A设计视图%B窗体视图%C数据表视图%D透视表视图', 'A', 4, 'xz'),
('04xz27', '用于显示、更新数据库中的字段的控件类型是(    )。%A绑定型%B非绑定型%C计算型%DA、B、C都是', 'A', 4, 'xz'),
('04xz28', '在窗体设计过程中，经常要使用的3种属性是(    )、控件属性和节属性。%A字段属性%B窗体属性%C查询属性%D报表属性', 'B', 4, 'xz'),
('04xz29', '在窗体设计视图中，按(    )键．同时单击鼠标可以选中多个控件。%ACtrl%BShift%CAlt%DSpace', 'B', 4, 'xz'),
('04xz30', '在某窗体的文本框中输入"=now()”，则在窗体视图上的该文本框中显示(    )。%A系统时间%B系统日期%C当前页码%D系统日期和时间', 'D', 4, 'xz'),
('04xz31', '在显示具有(    )关系的表或查询中的数据时，子窗体特别有效。%A一对一%B一对多%C多对多%DA、B、C都是', 'B', 4, 'xz'),
('04xz32', '在主/子窗体的子窗体中还可以创建子窗体，最多可以有(    )层子窗体。%A3%B5%C7%D9', 'C', 4, 'xz'),
('05dx01', '报表只能输出数据，不能(    )数据。%A输入%B编辑%C删除%D显示', '%A%B%C', 4, 'dx'),
('05dx02', '在“报表设计工具”下的“格式”选项卡中，包含有(    )等组。%A字体%B数字%C背景%D字母', '%A%B%C', 4, 'dx'),
('05xz01', '(    )的内容在报表每页头部打印输出。B%A报表页眉%B页面页眉%C页面页脚%D组页脚', 'C', 4, 'xz'),
('05xz02', '(    )是数据库中数据通过显示器或打印机输出的特有形式。%A报表%B窗体%C宏%D对象', 'A', 4, 'xz'),
('05xz03', 'Access报表对象的数据源可以是(    )。%A表、查询和窗体%B表、查询和报表%C表和查询%D表、查询和SQL命令', 'D', 4, 'xz'),
('05xz04', '报表页眉的内容只在报表的(    )打印输出。%A第一页顶部%B第一页尾部%C最后页中部%D最后页尾部', 'A', 4, 'xz'),
('05xz05', '报表与窗体的主要区别在于(    )。%A窗体和报表中都可以输入数据%B窗体可以输入数据，而报表中不能输入数据%C窗体和报表中都不可以输入数据%D窗体不可以输入数据，而报表中能输入数据', 'B', 4, 'xz'),
('05xz06', '报表中的内容是按照(    )单位来划分的。%A章%B节%C页%D行', 'B', 4, 'xz'),
('05xz07', '创建图表报表时必须使用(    )报表向导。%A表格式%B行表式%C纵栏式%D图表式', 'D', 4, 'xz'),
('05xz08', '创建子报表要使用(    )。%A报表向导%B自动报表向导%C图表向导%D报表设计视图', 'D', 4, 'xz'),
('05xz09', '单击“设计”选项卡上“分组和汇总”组中的“分组和排序”按钮，则在“设计视图”下方显示“分组、排序和汇总”窗格，并在该窗格中显示“添加组”和“(    )”按钮。A%A添加排序%B显示排序%C创建排序%D编辑排序', 'D', 4, 'xz'),
('05xz10', '关于报表的数据源（即记录源）(    )。%A可以是任意对象%B只能是表对象%C只能是查询对象%D只能是表对象或查询对象', 'D', 4, 'xz'),
('05xz11', '既可以查看报表样本数据，也可以编辑报表的视图是(    )。%A设计视图%B布局视图%C打印预览视图%D报表视图', 'B', 4, 'xz'),
('05xz12', '交叉报表是基于(    )的报表。%A主/从表查询%B交叉表查询%C主/子表查询%D参数查询', 'B', 4, 'xz'),
('05xz13', '如果建立报表所需要显示的信息位于多个数据表上，则必须将报表基于(    )来制作。%A多个数据表的全部数据%B由多个数据表中相关数据建立的查询%C由多个数据表中相关数据建立的窗体%D由多个数据表中相关数据组成的新表', 'B', 4, 'xz'),
('05xz14', '如果设置报表上某个文本框的控件来源属性为“= int( 12. 56)”，则打印预览视图中，该文本框显示的信息为(    )。%A未绑定%B12%Cint(12. 56)%D13', 'B', 4, 'xz'),
('05xz15', '通过(    )，可以将报表对象保存为单一文件。%A剪切%B复制%C粘贴%D导出报表', 'D', 4, 'xz'),
('05xz16', '下列关于排序与分组的说法中，不正确的是(    )。%A只要有分组（组页眉为“是”），就一定会有“排序次序”，默认是递增排序%B排序与分组没有绝对关系%C有分组必有排序，反之亦然%D有分组必有排序，但反过来说，设置排序之后，却不一定使用分组，视需求而定', 'C', 4, 'xz'),
('05xz17', '下列说法中，正确的是(    )。%A主报表和子报表必须基于相同的记录源%B主报表和子报表必须基于相关的记录源%C主报表和子报表不可以基于完全不同的记录源%D主报表和子报表可以基于完全不同的记录源', 'D', 4, 'xz'),
('05xz18', '要实现报表的分组统计，其操作区域是(    )。%A组页眉或组页脚%B页面页眉或页面页脚%C主体%D报表页眉或报表页脚', 'A', 4, 'xz'),
('05xz19', '要显示格式为“页码/总页数”的页码，应该设置文本框控件的控件来源属性为(    )。%A=[Page]/[ Pages]%B[Page]/[ Pages]%C=[Page]＆”/”&[Pages]%D[Page]＆”/”&[Pages]', 'C', 4, 'xz'),
('05xz20', '要想在报表的页脚中显示“page”和空格，然后显示页码，则在设计时应该输入(    )。%A= page&Page%B=page&[Page]%C=”page”&[Page]%D-”page”[Page]', 'C', 4, 'xz'),
('05xz21', '要在报表的最后一页底部输出信息，应通过(    )设置。%A组页脚%B报表页脚%C报表页眉%D页面页眉', 'B', 4, 'xz'),
('05xz22', '一个主报表最多只能包含(    )子窗体或子报表。%A一级%B两级%C三级%D五级', 'B', 4, 'xz'),
('05xz23', '以下叙述正确的是(    )。%A报表只能输入数据%B报表只能输出数据%C报表可以输入输出数据%D报表不能输入和输出数据', 'B', 4, 'xz'),
('05xz24', '在“外部数据”选项卡的“导出”组中包含有“Excel”、“文本文件”、“XML文件”和“(    )”等按钮。%APDF或XPS%B图片文件%C音乐文件%D视频文件', 'A', 4, 'xz'),
('05xz25', '在Access数据库中，专用于打印的是(    )。%A表%B查询%C报表%D页', 'C', 4, 'xz'),
('05xz26', '在报表“属性表”中，有关报表外观特征方面的属性值（如标题、宽度、滚动条等）是在(    )选项卡中进行设置的。%A“格式”%B“事件”%C“数据”%D“其他”', 'A', 4, 'xz'),
('05xz27', '在报表每一页的底部都输出信息，需要设置的区域是(    )。%A报表页眉%B报表页脚%C页面页眉%D页面页脚', 'D', 4, 'xz'),
('05xz28', '在报表设计的工具栏中，用于修饰版面以达到更好显示效果的控件是(    )。%A直线和矩形%B直线和圆形%C直线和多边形%D矩形和圆形', 'A', 4, 'xz'),
('05xz29', '在报表设计中，以下可以作为绑定控件，用于显示字段数据的是(    )。%A文本框%B标签%C直线%D徽标', 'A', 4, 'xz'),
('05xz30', '在报表向导中，最多可以按照(    )个字段对记录进行排序。%A1%B2%C3%D4', 'D', 4, 'xz'),
('05xz31', '在报表中，如果要对分组进行计算，应当将计算控件添加到(    )中。%A页面页眉或页面页脚%B报表页眉或报表页脚%C组页眉或组页脚%D主体', 'C', 4, 'xz'),
('05xz32', '在报表中可以对记录分组，分组必须建立在(    )的基础上。%A筛选%B抽取%C排序%D计算', 'C', 4, 'xz'),
('05xz33', '在打印多列报表时，报表页眉/报表页脚和页面页眉/页面页脚将占满(    )的整个宽度。%A字段%B报表%C控件%D页码位', 'B', 4, 'xz'),
('05xz34', '在关于报表数据源设置的叙述中，以下正确的是(    )。%A可以是任意对象%B只能是表对象%C只能是查询对象%D可以是表对象或查询对象', 'D', 4, 'xz'),
('05xz35', '在使用报表设计器设计报表时，如果要统计报表中某个字段的全部数据，应将计算表达式放在(    )。%A组页眉/组页脚%B页面页眉／页面页脚%C主体%D报表页眉/报表页脚', 'D', 4, 'xz'),
('06xz01', 'OpenForm操作可用来打开(    )。%A数据表%B报表%C窗体%D数据库管理系统', 'C', 4, 'xz'),
('06xz02', '关闭数据库对象使用的宏操作是(    )。%AQuit%BClose%CstopMacro%DReturn', 'B', 4, 'xz'),
('06xz03', '关于AutoExec宏的说法正确的是(    )。%A在每次重新启动Windows时，都会自动启动的宏%BAutoExec和其他宏一样，没什么区别%C在每次打开其所在的数据库时，都会自动运行的宏%D在每次启动Access时，都会自动运行的宏', 'C', 4, 'xz'),
('06xz04', '关于宏的执行，以下说法不正确的是(    )。%A在“导航窗格”，选择“宏”对象列表中的某个不含有子宏的宏并双击，可以直接运行该宏中的所有宏操作%B在“导航窗格”，选择“宏”对象列表中的某个含有子宏的宏并双击，可以直接运行该宏中的所有宏操作%C在一个宏中可以运行另一个宏%D在打开数据库时，可以自动运行AutoExec宏', 'B', 4, 'xz'),
('06xz05', '关于宏运行的方式，错误的是(    )。%A在“宏”生成器中运行宏%B在窗体或控件的事件中触发宏%C宏不可以直接运行%D通过RunMacro运行宏', 'C', 4, 'xz'),
('06xz06', '假如要显示表的所有记录，可使用(    )操作。%AShowRecords%BShowAllRecords%CAIIRecords%DShowAll', 'B', 4, 'xz'),
('06xz07', '每条宏指令都必须选择或填写的是(    )列。%A操作%B宏名%C条件%D注释', 'A', 4, 'xz'),
('06xz08', '如果同一个条件中要执行多条宏指令，可以在“条件”列中输入(    )表示与上一条宏指令按照相同的条件执行。%A等号：%B星号。%C省略号…%D百分号', 'C', 4, 'xz'),
('06xz09', '数据宏的创建是在(    )的设计视图情况下进行的。%A窗体%B报表%C查询%D表', 'D', 4, 'xz'),
('06xz10', '通过(    )操作可以运行数据宏。%ARunMenuCommand%BRunCode%CRunMacro%DRunDataMacro', 'D', 4, 'xz'),
('06xz11', '为窗体或报表上的某个控件的单击事件创建了嵌入宏之后，在属性表中该控件的单击事件属性值组合框中显示(    )。%A“嵌入宏”%B[嵌入宏]%C“嵌入的宏”%D[嵌入的宏]', 'D', 4, 'xz'),
('06xz12', '下列宏操作中，不属于“数据输入操作”子目录中的操作是(    )。%ADeleteRecord%BEditListltems%CGotoPage%DSaveRecord', 'C', 4, 'xz'),
('06xz13', '下列宏操作中，设置控件属性的操作是(    )。%ASetLocalVar%BSetTempVar%CSetOrderBy%DSetProperty', 'D', 4, 'xz'),
('06xz14', '要查找记录可使用(    )操作。%AIndexRecord%BFindRecord%CPrintRecord%DShowRecord', 'B', 4, 'xz'),
('06xz15', '要运行宏中的某一个子宏时，需要以(    )格式来指定宏名。%A宏名%B子宏名，宏名%C子宏名%D宏名．子宏名', 'D', 4, 'xz'),
('06xz16', '以下关于宏的描述中，错误的是(    )。%A宏是一种工具，可以用它来自动完成任务，并向窗体、报表和控件中添加功能%B在Access中，可以将宏看作一种简化的编程语言%C一个宏对象可以包含多个宏%D一个宏由单个宏操作组成，大多数操作都不需要参数', 'D', 4, 'xz'),
('06xz17', '以下关于宏指令的描述中，错误的是(    )。%AOpenForm：打开窗体%BOpenQuery：打开查询%COpenReport：打开报表%DStopMacro：执行宏，没有参数', 'D', 4, 'xz'),
('06xz18', '在“宏生成器”窗格的“添加新操作”组合框的左侧显出一个(    )的“+”字。%A绿色%B红色%C黄色%D蓝色', 'A', 4, 'xz'),
('06xz19', '在宏设计视图的(    )窗格中，才能进行添加、修改或删除宏的操作。%A导航%B操作目录%C宏生成器%D功能', 'C', 4, 'xz'),
('06xz20', '直接运行含有子宏的宏时，只执行该宏中的(    )中的所有操作命令。%A第二个子宏%B第三个子宏%C第一个子宏%D最后一个子宏', 'C', 4, 'xz');

-- --------------------------------------------------------

--
-- 表的结构 `Exam`
--

CREATE TABLE IF NOT EXISTS `Exam` (
  `Hno` int(11) NOT NULL AUTO_INCREMENT COMMENT '考试号',
  `Hcno` varchar(200) CHARACTER SET latin1 NOT NULL COMMENT '章节号',
  `Hname` varchar(50) NOT NULL COMMENT '考试名称',
  `Hreleasedate` date NOT NULL COMMENT '发布时间',
  `Hdeadline` date NOT NULL COMMENT '截止时间',
  `Htime` varchar(10) CHARACTER SET latin1 NOT NULL COMMENT '答题时间',
  `Hkno` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT '所属知识点',
  `Hstage` varchar(2) CHARACTER SET latin1 NOT NULL COMMENT '难度系数',
  `Hfinal` int(1) NOT NULL DEFAULT '0' COMMENT '区分考试与作业0为作业',
  `Hnuma` smallint(6) DEFAULT NULL COMMENT '单选题数目',
  `Hnumas` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT '单选题ID数组',
  `Hnumb` smallint(6) DEFAULT NULL COMMENT '多选题数目',
  `Hnumbs` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT '多选题ID数组',
  `Hnumc` smallint(6) DEFAULT NULL COMMENT '填空题数目',
  `Hnumcs` varchar(200) CHARACTER SET latin1 DEFAULT NULL COMMENT '填空题ID数组',
  PRIMARY KEY (`Hno`),
  KEY `Hcno` (`Hcno`),
  KEY `Hkno` (`Hkno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `Exam`
--

INSERT INTO `Exam` (`Hno`, `Hcno`, `Hname`, `Hreleasedate`, `Hdeadline`, `Htime`, `Hkno`, `Hstage`, `Hfinal`, `Hnuma`, `Hnumas`, `Hnumb`, `Hnumbs`, `Hnumc`, `Hnumcs`) VALUES
(47, '100', '第1章 习题', '2013-09-23', '2013-09-30', '100', '1', 'B', 0, 19, '01xz01%01xz02%01xz03%01xz04%01xz05%01xz06%01xz07%01xz09%01xz10%01xz11%01xz12%01xz13%01xz14%01xz15%01xz16%01xz17%01xz18%01xz19%01xz20', 3, '01xz08%01xz21%01xz22', 7, '01tk01%01tk02%01tk03%01tk04%01tk05%01tk06%01tk07'),
(48, '200', '第2章 习题', '2013-09-30', '2013-10-07', '100', '2', 'B', 0, 32, '02xz01%02xz02%02xz03%02xz04%02xz05%02xz06%02xz07%02xz08%02xz09%02xz10%02xz11%02xz12%02xz13%02xz14%02xz15%02xz16%02xz17%02xz18%02xz19%02xz20%02xz21%02xz22%02xz23%02xz24%02xz25%02xz26%02xz27%02xz28%02xz', 0, '', 16, '02tk01%02tk02%02tk03%02tk04%02tk05%02tk06%02tk07%02tk08%02tk09%02tk10%02tk11%02tk12%02tk13%02tk14%02tk15%02tk16');

-- --------------------------------------------------------

--
-- 表的结构 `ExamAnswerForStudent`
--

CREATE TABLE IF NOT EXISTS `ExamAnswerForStudent` (
  `Ano` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '试卷号',
  `Asno` varchar(10) NOT NULL COMMENT '考生号',
  `Ahno` int(11) NOT NULL COMMENT '考试号',
  `Ahsubtime` date NOT NULL COMMENT '提交时间',
  `Ahscore` varchar(10) NOT NULL DEFAULT '0' COMMENT '考试成绩',
  `Atime` varchar(20) NOT NULL COMMENT '答题用时',
  PRIMARY KEY (`Ano`),
  KEY `Asno` (`Asno`),
  KEY `Ahno` (`Ahno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ExamAnswerForStudent`
--

INSERT INTO `ExamAnswerForStudent` (`Ano`, `Asno`, `Ahno`, `Ahsubtime`, `Ahscore`, `Atime`) VALUES
(5, '12212939', 47, '2013-09-21', '3', '');

-- --------------------------------------------------------

--
-- 表的结构 `ExamTemplet`
--

CREATE TABLE IF NOT EXISTS `ExamTemplet` (
  `ETid` int(11) NOT NULL AUTO_INCREMENT COMMENT '模板id',
  `ETname` varchar(20) NOT NULL COMMENT '模板名称',
  `ETchapters` varchar(200) DEFAULT NULL COMMENT '章节数组',
  `ETknowledges` varchar(200) DEFAULT NULL COMMENT '知识点数组',
  `ETstage` varchar(5) DEFAULT NULL COMMENT '难度系数',
  `ETsinglechoose` int(11) NOT NULL COMMENT '单选题数目',
  `ETmultichoose` int(11) NOT NULL COMMENT '多选题数目',
  `ETfills` int(11) NOT NULL COMMENT '填空题数目',
  `EToperate` int(11) NOT NULL COMMENT '操作题数目',
  `ETshort` int(11) NOT NULL COMMENT '简答题数目',
  PRIMARY KEY (`ETid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `FillProblem`
--

CREATE TABLE IF NOT EXISTS `FillProblem` (
  `FPid` varchar(50) NOT NULL COMMENT '填空题ID',
  `FPcontent` varchar(1000) NOT NULL COMMENT '填空题题干',
  `FPanswer` varchar(1000) NOT NULL COMMENT '填空题答案数组',
  `FPnumber` int(11) NOT NULL COMMENT '空的个数',
  `FPratio` varchar(1000) NOT NULL COMMENT '每个空分数比例数组',
  PRIMARY KEY (`FPid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `FillProblem`
--

INSERT INTO `FillProblem` (`FPid`, `FPcontent`, `FPanswer`, `FPnumber`, `FPratio`) VALUES
('01tk01', 'Access 2010数据库文件的扩展名是【1】。', '%accdb', 1, ''),
('01tk02', '在Access 2010【1】视图下，创建表更加容易了，不必预先在设计视图下定义表的结构。', '%数据表', 1, ''),
('01tk03', 'Access 2010【1】代替了在Access的早期版本中的菜单和工具栏分层。', '%功能区', 1, ''),
('01tk04', 'Access 2010基本对象包括【1】、【2】、窗体、报表、【3】和【4】。', '%表%查询%宏%模块', 4, ''),
('01tk05', 'Access 2010从导航窗格查看自定义类别和组时，始终会看到对象的【1】。', '%快捷方式', 1, ''),
('01tk06', 'Access 2010数据库对象的基本操作包括运行、编辑对象以及设置视图方式等，这些操作主要是通过【1】、选项卡和上下文选项卡来完成的。', '%导航窗格', 1, ''),
('01tk07', 'Access 2010最关键的新界面元素称为【1】，它是一个横跨程序窗口顶部的条形带。', '%功能区', 1, ''),
('02tk01', 'Access提供了文本和【1】两种字段数据类型保存文本和数字组合的数据。', '%备注', 1, ''),
('02tk02', 'Access表都要求设置【1】个主键。', '%1', 1, ''),
('02tk03', '表间关系类型包括：一对多、【1】_和【2】。', '%一对一%多对多', 2, ''),
('02tk04', '在Access 2010数据库中，OLE对象和【1】类型字段可以存储二进制数据和文件。', '%附件', 1, ''),
('02tk05', '数据库中的每个表都应该有一个字段或字段集，用来唯一标识该表中存储的每条记录。这个字段或字段集称为【1】。', '%主键', 1, ''),
('02tk06', '主键的索引属性应设置为【1】。', '%有(无重复)', 1, ''),
('02tk07', '数据库表间连接类型包括内部连接、【1】和【2】。', '%左外连接%右外连接', 2, ''),
('02tk08', '超链接类型的字段值可以是指向原有的文件/网页或者【1】。', '%电子邮件地址', 1, ''),
('02tk09', '创建表有3种方法，分别是【1】、【2】和导入表。', '%设计器%数据表视图', 2, ''),
('02tk10', '表的索引类型有【1】、【2】和【3】。', '%唯一索引%主索引%普通索引', 3, ''),
('02tk11', '索引属性的值又3种可能的取值，它们分别是【1】、【2】和【3】。', '%无%有(有重复)%有(无重复)', 3, ''),
('02tk12', '有效性规则用于设置输入到字段中的【1】。有效性文本用来设置【2】。', '%数据值域%出错提示信息', 2, ''),
('02tk13', '修改表的结构应在【1】中进行。', '%表设计器', 1, ''),
('02tk14', '主键是用于【1】表中每条记录的一个或多个字段。', '%唯一标识', 1, ''),
('02tk15', '创建表间的关系时，在父表中必须按照连接字段创建【1】。', '', 0, ''),
('02tk16', '筛选是按照【1】从表中选出【2】的记录。', '%给定条件%满足条件', 2, ''),
('03tk01', '查询用于在一个或多个表内查找某些特定的【１】，完成数据的检索、定位和计算的功能，供用户查看。', '%记录', 1, ''),
('03tk02', '筛选的结果是滤除【１】的记录。', '%不满足条件', 1, ''),
('03tk03', '在Access中，对表进行列求和的查询是【１】查询。', '%汇总查询', 1, ''),
('03tk04', '在Access中，将指定记录复制到指定新表的查询是【１】查询。', '%生成表', 1, ''),
('03tk05', 'Access查询的数据源可以来自【１】和【２】。', '%表%查询', 2, ''),
('03tk06', '操作查询包括更新查询、【１】查询、【２】查询和【３】查询。', '%生成表%追加%删除', 3, ''),
('03tk07', '在查询中，如果需要对数值型字段进行求和应使用【１】函数。', '%sum', 1, ''),
('03tk08', '查询有5种视图方式，分别是【１】视图、数据透视表视图、数据透视图视图、【２】视图和【３】视图。', '%数据表%SQL%设计', 3, ''),
('03tk09', '在交叉表查询中，作为列标题的字段只能有【１】个。', '%1', 1, ''),
('03tk10', '在SQL语句中，FROM子句表示【１】，GROUP BY子句用于【２】。', '%数据源%分组', 2, ''),
('03tk11', '在查询中设计视图中，判断某个字段是否为空，需要在条件行设置的表达式为【１】。', '%Is Null', 1, ''),
('03tk12', '查询的“条件”项上，同一行的条件之间是【１】的关系，不同行的条件是【２】的关系：', '%and%or', 2, ''),
('03tk13', '能够对源数据表的记录进行修改的查询有【１】查询。', '%更新', 1, ''),
('03tk14', '在查询设计过程中．如果在“条件”行将姓名字段的设置为“Like”*国*””，则查询的记录应满足条件姓名【１】“国”字。', '%包含', 1, ''),
('04tk01', 'Access 2010中，添加【１】和【２】控件时系统会自动将该控件放置在窗体页眉。', '%徽标%标题', 2, ''),
('04tk02', 'Access 2010中提供了6种窗体视图，分别为窗体视图、设计视图、数据表视图、【１】视图、【２】视图和【３】视图。', '%布局%数据透视表%数据透视图', 3, ''),
('04tk03', '窗体的控件可以分为【１】型、【２】型、【３】型和ActiveX控件4种类型。', '%非绑定%绑定%计算', 3, ''),
('04tk04', '窗体对象有3种视图，分别是【１】视图、【２】视图和【３】视图。', '%窗体%布局%设计', 3, ''),
('04tk05', '窗体由多个部分组成，每个部分称为一个【１】，大部分的窗体只有【２】节。', '%节%主体', 2, ''),
('04tk06', '窗体中的窗体称为【１】，其中可以创建为【２】式或数据表窗体。', '%子窗体%现有的窗体', 2, ''),
('04tk07', '窗体中的数据主要来源于【１】和【２】。', '%表%查询', 2, ''),
('04tk08', '创建窗体可以使用【１】和使用【２】两种方式。', '%窗体向导%手动方式', 2, ''),
('04tk09', '对象的【１】描述了对象的状态和特性。', '%属性', 1, ''),
('04tk10', '可在一个窗体中嵌入另一个窗体，这种结构的窗体称为【１】窗体。', '%主/子', 1, ''),
('04tk11', '数据透视窗体有【１】和【２】。', '%数据透视图%数据透视表', 2, ''),
('04tk12', '调整控件之间的间距除了直接用鼠标操作以外，还可以通过【１】视图设置。', '%布局', 1, ''),
('04tk13', '在创建主/子窗体之前，必须设置【１】之间的关系。', '%数据源', 1, ''),
('05tk01', '在报表设计中，可以通过添加【１】控件来控制另起一页输出显示。', '%分页符', 1, ''),
('05tk02', '报表设计中，可以通过在组页眉或组页脚中创建【１】控件来显示记录的分组汇总数据。', '%计算型文本框', 1, ''),
('05tk03', '报表页眉的内容只在报表的【１】打印输出。', '%第一页顶部', 1, ''),
('05tk04', '报表页脚的内容只在报表的【１】打印输出。', '%最后一页的页面页脚节之上', 1, ''),
('05tk05', '在Access报表中最多可以设置【１】个分组级别和排序级别。', '%10', 1, ''),
('05tk06', '在报表的设计视图中，区段表示为带状形式，也被称为【１】。', '%报表节', 1, ''),
('05tk07', '使用【１】创建报表，可以完成大部分报表设计基本操作，加快了创建报表的过程。', '%报表向导', 1, ''),
('05tk08', '计算所有学生“已缴纳学费金额”字段的总计值，需在【１】添加控件并设置空间源属性为【２】。', '%报表页眉/报表页脚%=sum([已缴纳学费金额])', 2, ''),
('05tk09', '使用【１】可以对整个报表控件设置格式。', '%自动套用格式', 1, ''),
('06tk01', 'Access2010增加了【１】的功能，以便在条件表达式中控制宏的运行。', '%临时变量', 1, ''),
('06tk02', '在控件事件中，触发宏组中某一个宏的格式为【１】。', '%[宏组名称].[宏名称]', 1, ''),
('06tk03', '通过宏的【１】功能，可以检验宏的运行是否正常。', '%调试', 1, ''),
('06tk04', '【１】宏操作的作用是退出Access应用系统。', '%Quit', 1, ''),
('06tk05', '宏是由一个或多个【１】组成的集合。', '%操作', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `Knowledge`
--

CREATE TABLE IF NOT EXISTS `Knowledge` (
  `Kno` varchar(50) NOT NULL COMMENT '知识点号',
  `Kname` varchar(30) NOT NULL COMMENT '知识点名称',
  PRIMARY KEY (`Kno`),
  UNIQUE KEY `Kname` (`Kname`),
  UNIQUE KEY `Kno` (`Kno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `Knowledge`
--

INSERT INTO `Knowledge` (`Kno`, `Kname`) VALUES
('1', '基础知识'),
('2', '知识点2'),
('3', '知识点3'),
('4', '知识点4'),
('5', '知识点5'),
('6', '知识点6');

-- --------------------------------------------------------

--
-- 表的结构 `Pexercise`
--

CREATE TABLE IF NOT EXISTS `Pexercise` (
  `Peno` int(11) NOT NULL AUTO_INCREMENT COMMENT '习题号',
  `Pcno` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT '章节号',
  `Pecontent` varchar(1000) NOT NULL COMMENT '习题题目',
  `Panswer` varchar(1000) NOT NULL COMMENT '习题答案',
  `pin` varchar(1000) CHARACTER SET latin1 NOT NULL COMMENT '回答输入文件(Txt)',
  `pout` varchar(1000) CHARACTER SET latin1 NOT NULL COMMENT '回答输出文件(Txt)',
  `Pscore` smallint(6) NOT NULL COMMENT '题目分值',
  `Pstage` varchar(5) CHARACTER SET latin1 NOT NULL COMMENT '题目难度系数(A/B/C/D)',
  `Pstyle` varchar(50) NOT NULL COMMENT '所属知识点',
  PRIMARY KEY (`Peno`),
  KEY `Pcno` (`Pcno`),
  KEY `Pstyle` (`Pstyle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `PexerciseAnswerForstudent`
--

CREATE TABLE IF NOT EXISTS `PexerciseAnswerForstudent` (
  `Pano` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '答案文件号',
  `Peno` int(11) NOT NULL COMMENT '题目号',
  `Paname` varchar(50) NOT NULL COMMENT '答案文件名 ',
  `Psno` varchar(10) NOT NULL COMMENT '学生号',
  `Pstate` varchar(5) NOT NULL COMMENT '判定状态',
  `Presult` varchar(10) DEFAULT NULL COMMENT '判定结果',
  `Pscore` smallint(6) NOT NULL DEFAULT '0' COMMENT '答案得分',
  `Phno` int(11) NOT NULL COMMENT '所属考试号',
  `Pnum` smallint(6) NOT NULL COMMENT '提交次数',
  `Ptime` varchar(10) NOT NULL COMMENT '提交时间',
  `pnumber` int(11) NOT NULL COMMENT '卷子中的题号',
  PRIMARY KEY (`Pano`),
  KEY `Peno` (`Peno`),
  KEY `Psno` (`Psno`),
  KEY `Phno` (`Phno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `Sno` varchar(20) NOT NULL COMMENT '学生学号',
  `Stno` varchar(20) DEFAULT NULL COMMENT '学生所在老师号',
  `Sclass` varchar(10) DEFAULT NULL COMMENT '班级号',
  `Scourse` varchar(10) DEFAULT NULL COMMENT '授课号',
  PRIMARY KEY (`Sno`),
  KEY `Stno` (`Stno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Student`
--

INSERT INTO `Student` (`Sno`, `Stno`, `Sclass`, `Scourse`) VALUES
('10321147', '12212938', '3500017313', '35000173'),
('10346018', '12212938', '3500017313', '35000173'),
('11307044', '12212938', '3500017313', '35000173'),
('11307199', '12212938', '3500017313', '35000173'),
('11307444', '12212938', '3500017313', '35000173'),
('11316005', '12212938', '3500017313', '35000173'),
('11316059', '12212938', '3500017313', '35000173'),
('11316070', '12212938', '3500017313', '35000173'),
('11317044', '12212938', '3500017313', '35000173'),
('11317157', '12212938', '3500017313', '35000173'),
('11330005', '12212938', '3500017313', '35000173'),
('11358062', '12212938', '3500017313', '35000173'),
('12212939', '12212938', '3500017313', '35000173'),
('12302036', '12212938', '3500017313', '35000173'),
('12303018', '12212938', '3500017313', '35000173'),
('12303019', '12212938', '3500017313', '35000173'),
('12303061', '12212938', '3500017313', '35000173'),
('12303071', '12212938', '3500017313', '35000173'),
('12303080', '12212938', '3500017313', '35000173'),
('12303082', '12212938', '3500017313', '35000173'),
('12303084', '12212938', '3500017313', '35000173'),
('12303086', '12212938', '3500017313', '35000173'),
('12303098', '12212938', '3500017313', '35000173'),
('12303121', '12212938', '3500017313', '35000173'),
('12303122', '12212938', '3500017313', '35000173'),
('12303134', '12212938', '3500017313', '35000173'),
('12303170', '12212938', '3500017313', '35000173'),
('12303212', '12212938', '3500017313', '35000173'),
('12304014', '12212938', '3500017313', '35000173'),
('12304024', '12212938', '3500017313', '35000173'),
('12307092', '12212938', '3500017313', '35000173'),
('12307405', '12212938', '3500017313', '35000173'),
('12307512', '12212938', '3500017313', '35000173'),
('12317101', '12212938', '3500017313', '35000173'),
('12317118', '12212938', '3500017313', '35000173'),
('12318003', '12212938', '3500017313', '35000173'),
('12318012', '12212938', '3500017313', '35000173'),
('12318050', '12212938', '3500017313', '35000173'),
('12318055', '12212938', '3500017313', '35000173'),
('12318073', '12212938', '3500017313', '35000173'),
('12318078', '12212938', '3500017313', '35000173'),
('12318121', '12212938', '3500017313', '35000173'),
('12318166', '12212938', '3500017313', '35000173'),
('12319069', '12212938', '3500017313', '35000173'),
('12326005', '12212938', '3500017313', '35000173'),
('12326006', '12212938', '3500017313', '35000173'),
('12326033', '12212938', '3500017313', '35000173'),
('12326041', '12212938', '3500017313', '35000173'),
('12326054', '12212938', '3500017313', '35000173'),
('12327026', '12212938', '3500017313', '35000173'),
('12327045', '12212938', '3500017313', '35000173'),
('12327053', '12212938', '3500017313', '35000173'),
('12327069', '12212938', '3500017313', '35000173'),
('12327187', '12212938', '3500017313', '35000173'),
('12327240', '12212938', '3500017313', '35000173'),
('12327308', '12212938', '3500017313', '35000173'),
('12327310', '12212938', '3500017313', '35000173'),
('12327311', '12212938', '3500017313', '35000173'),
('12329003', '12212938', '3500017313', '35000173'),
('12329006', '12212938', '3500017313', '35000173'),
('12329019', '12212938', '3500017313', '35000173'),
('12329027', '12212938', '3500017313', '35000173'),
('12329028', '12212938', '3500017313', '35000173'),
('12329054', '12212938', '3500017313', '35000173'),
('12329091', '12212938', '3500017313', '35000173'),
('12329125', '12212938', '3500017313', '35000173'),
('12329134', '12212938', '3500017313', '35000173'),
('12329161', '12212938', '3500017313', '35000173'),
('12329172', '12212938', '3500017313', '35000173'),
('12329182', '12212938', '3500017313', '35000173'),
('12329183', '12212938', '3500017313', '35000173'),
('12329188', '12212938', '3500017313', '35000173'),
('12329190', '12212938', '3500017313', '35000173'),
('12329196', '12212938', '3500017313', '35000173'),
('12329226', '12212938', '3500017313', '35000173'),
('12337016', '12212938', '3500017313', '35000173'),
('12337019', '12212938', '3500017313', '35000173'),
('12337026', '12212938', '3500017313', '35000173'),
('12337028', '12212938', '3500017313', '35000173'),
('12353010', '12212938', '3500017313', '35000173'),
('12353046', '12212938', '3500017313', '35000173'),
('12353048', '12212938', '3500017313', '35000173'),
('12353049', '12212938', '3500017313', '35000173'),
('12353087', '12212938', '3500017313', '35000173'),
('12353090', '12212938', '3500017313', '35000173'),
('12353107', '12212938', '3500017313', '35000173'),
('12353122', '12212938', '3500017313', '35000173'),
('12353123', '12212938', '3500017313', '35000173'),
('12353127', '12212938', '3500017313', '35000173'),
('12353128', '12212938', '3500017313', '35000173'),
('12353136', '12212938', '3500017313', '35000173'),
('12353139', '12212938', '3500017313', '35000173'),
('12353145', '12212938', '3500017313', '35000173'),
('12353156', '12212938', '3500017313', '35000173'),
('12353161', '12212938', '3500017313', '35000173'),
('12353166', '12212938', '3500017313', '35000173'),
('12353182', '12212938', '3500017313', '35000173'),
('12353194', '12212938', '3500017313', '35000173'),
('12353200', '12212938', '3500017313', '35000173'),
('12353204', '12212938', '3500017313', '35000173'),
('12353213', '12212938', '3500017313', '35000173'),
('12353217', '12212938', '3500017313', '35000173'),
('12353227', '12212938', '3500017313', '35000173'),
('12353228', '12212938', '3500017313', '35000173'),
('12353229', '12212938', '3500017313', '35000173'),
('12353233', '12212938', '3500017313', '35000173'),
('12353241', '12212938', '3500017313', '35000173'),
('12353242', '12212938', '3500017313', '35000173'),
('12353245', '12212938', '3500017313', '35000173'),
('12353246', '12212938', '3500017313', '35000173'),
('12353247', '12212938', '3500017313', '35000173'),
('12353286', '12212938', '3500017313', '35000173'),
('12353288', '12212938', '3500017313', '35000173'),
('12353290', '12212938', '3500017313', '35000173'),
('13307110', '12212938', '3500017313', '35000173'),
('13307111', '12212938', '3500017313', '35000173'),
('13307160', '12212938', '3500017313', '35000173'),
('13307174', '12212938', '3500017313', '35000173'),
('13307306', '12212938', '3500017313', '35000173'),
('13317050', '12212938', '3500017313', '35000173'),
('13318019', '12212938', '3500017313', '35000173'),
('13318068', '12212938', '3500017313', '35000173'),
('13318084', '12212938', '3500017313', '35000173'),
('13319020', '12212938', '3500017313', '35000173'),
('13329029', '12212938', '3500017313', '35000173'),
('13330041', '12212938', '3500017313', '35000173'),
('13330044', '12212938', '3500017313', '35000173'),
('13330130', '12212938', '3500017313', '35000173'),
('13354016', '12212938', '3500017313', '35000173'),
('13354026', '12212938', '3500017313', '35000173'),
('13354065', '12212938', '3500017313', '35000173'),
('13354092', '12212938', '3500017313', '35000173'),
('13354107', '12212938', '3500017313', '35000173'),
('13354160', '12212938', '3500017313', '35000173'),
('13354174', '12212938', '3500017313', '35000173'),
('13354177', '12212938', '3500017313', '35000173'),
('13354274', '12212938', '3500017313', '35000173'),
('13354299', '12212938', '3500017313', '35000173'),
('13354325', '12212938', '3500017313', '35000173'),
('13354353', '12212938', '3500017313', '35000173'),
('13354491', '12212938', '3500017313', '35000173');

-- --------------------------------------------------------

--
-- 表的结构 `Teacher`
--

CREATE TABLE IF NOT EXISTS `Teacher` (
  `Tno` varchar(20) NOT NULL COMMENT '教师号',
  `Tpt` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '职称',
  `Tsearch` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '研究方向',
  `Tstucount` smallint(6) DEFAULT '0' COMMENT '学生人数',
  PRIMARY KEY (`Tno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Teacher`
--

INSERT INTO `Teacher` (`Tno`, `Tpt`, `Tsearch`, `Tstucount`) VALUES
('12212938', '教授', '数据库', 30);

-- --------------------------------------------------------

--
-- 表的结构 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UID` varchar(20) NOT NULL COMMENT '用户号',
  `Uname` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户名字',
  `Usex` varchar(2) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户性别',
  `Uage` smallint(6) DEFAULT NULL COMMENT '用户年龄',
  `Unation` varchar(10) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户民族',
  `UBP` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户籍贯',
  `Upassword` varchar(40) NOT NULL COMMENT '用户密码',
  `Uschool` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户所在学校',
  `regdate` date NOT NULL COMMENT '注册时间',
  `Ustatus` varchar(5) DEFAULT NULL COMMENT '用户身份(S/T/A)',
  `Uemail` varchar(200) DEFAULT NULL COMMENT '电邮',
  `Uphone` varchar(20) DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `User`
--

INSERT INTO `User` (`UID`, `Uname`, `Usex`, `Uage`, `Unation`, `UBP`, `Upassword`, `Uschool`, `regdate`, `Ustatus`, `Uemail`, `Uphone`) VALUES
('10321147', '诸沁微', '', 0, '', '', '10321147', '', '2013-09-20', 'S', '', ''),
('10346018', '石晨光', '', 0, '', '', '10346018', '', '2013-09-20', 'S', '', ''),
('11307044', '程昊', '', 0, '', '', '11307044', '', '2013-09-20', 'S', '', ''),
('11307199', '李炜荣', '', 0, '', '', '11307199', '', '2013-09-20', 'S', '', ''),
('11307444', '肖倩兰', '', 0, '', '', '11307444', '', '2013-09-20', 'S', '', ''),
('11316005', '陈家欣', '', 0, '', '', '11316005', '', '2013-09-20', 'S', '', ''),
('11316059', '李娜萍', '', 0, '', '', '11316059', '', '2013-09-20', 'S', '', ''),
('11316070', '林奋', '', 0, '', '', '11316070', '', '2013-09-20', 'S', '', ''),
('11317044', '贾依文', '', 0, '', '', '11317044', '', '2013-09-20', 'S', '', ''),
('11317157', '张欣然', '', 0, '', '', '11317157', '', '2013-09-20', 'S', '', ''),
('11330005', '蔡拓', '', 0, '', '', '11330005', '', '2013-09-20', 'S', '', ''),
('11358062', '万学进', '', 0, '', '', '11358062', '', '2013-09-20', 'S', '', ''),
('12212938', '陈老师', '男', 21, '汉族', '江西', '12212938', '中山大学', '2013-09-20', 'T', '1019234001@qq.com', '13710659633'),
('12212939', '李敬医', '男', 23, '汉族', '河南', '123456', '中山大学', '2013-09-20', 'S', 'zawdd@163.com', '13763344264'),
('12302036', '余鸿峰', '', 0, '', '', '12302036', '', '2013-09-20', 'S', '', ''),
('12303018', '陈茵茵', '', 0, '', '', '12303018', '', '2013-09-20', 'S', '', ''),
('12303019', '陈颖', '', 0, '', '', '12303019', '', '2013-09-20', 'S', '', ''),
('12303061', '黄泽洪', '', 0, '', '', '12303061', '', '2013-09-20', 'S', '', ''),
('12303071', '李浩', '', 0, '', '', '12303071', '', '2013-09-20', 'S', '', ''),
('12303080', '李晓文', '', 0, '', '', '12303080', '', '2013-09-20', 'S', '', ''),
('12303082', '李永森', '', 0, '', '', '12303082', '', '2013-09-20', 'S', '', ''),
('12303084', '李越', '', 0, '', '', '12303084', '', '2013-09-20', 'S', '', ''),
('12303086', '梁昊', '', 0, '', '', '12303086', '', '2013-09-20', 'S', '', ''),
('12303098', '刘畅', '', 0, '', '', '12303098', '', '2013-09-20', 'S', '', ''),
('12303121', '沈晓冰', '', 0, '', '', '12303121', '', '2013-09-20', 'S', '', ''),
('12303122', '舒洪涛', '', 0, '', '', '12303122', '', '2013-09-20', 'S', '', ''),
('12303134', '田珮力', '', 0, '', '', '12303134', '', '2013-09-20', 'S', '', ''),
('12303170', '熊誉', '', 0, '', '', '12303170', '', '2013-09-20', 'S', '', ''),
('12303212', '钟焕珍', '', 0, '', '', '12303212', '', '2013-09-20', 'S', '', ''),
('12304014', '李志钒', '', 0, '', '', '12304014', '', '2013-09-20', 'S', '', ''),
('12304024', '田雨', '', 0, '', '', '12304024', '', '2013-09-20', 'S', '', ''),
('12307092', '郭晓雯', '', 0, '', '', '12307092', '', '2013-09-20', 'S', '', ''),
('12307405', '温海雯', '', 0, '', '', '12307405', '', '2013-09-20', 'S', '', ''),
('12307512', '张荣霞', '', 0, '', '', '12307512', '', '2013-09-20', 'S', '', ''),
('12317101', '潘文敏', '', 0, '', '', '12317101', '', '2013-09-20', 'S', '', ''),
('12317118', '苏嘉键', '', 0, '', '', '12317118', '', '2013-09-20', 'S', '', ''),
('12318003', '蔡成吉', '', 0, '', '', '12318003', '', '2013-09-20', 'S', '', ''),
('12318012', '陈景新', '', 0, '', '', '12318012', '', '2013-09-20', 'S', '', ''),
('12318050', '何迪', '', 0, '', '', '12318050', '', '2013-09-20', 'S', '', ''),
('12318055', '黄嘉慧', '', 0, '', '', '12318055', '', '2013-09-20', 'S', '', ''),
('12318073', '李璐均', '', 0, '', '', '12318073', '', '2013-09-20', 'S', '', ''),
('12318078', '李旭东', '', 0, '', '', '12318078', '', '2013-09-20', 'S', '', ''),
('12318121', '汪阳天', '', 0, '', '', '12318121', '', '2013-09-20', 'S', '', ''),
('12318166', '张伟焜', '', 0, '', '', '12318166', '', '2013-09-20', 'S', '', ''),
('12319069', '郑楚杏', '', 0, '', '', '12319069', '', '2013-09-20', 'S', '', ''),
('12326005', '陈嫦华', '', 0, '', '', '12326005', '', '2013-09-20', 'S', '', ''),
('12326006', '陈非儿', '', 0, '', '', '12326006', '', '2013-09-20', 'S', '', ''),
('12326033', '廖自强', '', 0, '', '', '12326033', '', '2013-09-20', 'S', '', ''),
('12326041', '聂志诚', '', 0, '', '', '12326041', '', '2013-09-20', 'S', '', ''),
('12326054', '伍嘉雯', '', 0, '', '', '12326054', '', '2013-09-20', 'S', '', ''),
('12327026', '陈施琦', '', 0, '', '', '12327026', '', '2013-09-20', 'S', '', ''),
('12327045', '戴圣清', '', 0, '', '', '12327045', '', '2013-09-20', 'S', '', ''),
('12327053', '方泓曦', '', 0, '', '', '12327053', '', '2013-09-20', 'S', '', ''),
('12327069', '郝嘉欣', '', 0, '', '', '12327069', '', '2013-09-20', 'S', '', ''),
('12327187', '錢芷蕙', '', 0, '', '', '12327187', '', '2013-09-20', 'S', '', ''),
('12327240', '武翔宇', '', 0, '', '', '12327240', '', '2013-09-20', 'S', '', ''),
('12327308', '郑韵之', '', 0, '', '', '12327308', '', '2013-09-20', 'S', '', ''),
('12327310', '钟思琦', '', 0, '', '', '12327310', '', '2013-09-20', 'S', '', ''),
('12327311', '周芳', '', 0, '', '', '12327311', '', '2013-09-20', 'S', '', ''),
('12329003', '蔡怡倩', '', 0, '', '', '12329003', '', '2013-09-20', 'S', '', ''),
('12329006', '岑健茹', '', 0, '', '', '12329006', '', '2013-09-20', 'S', '', ''),
('12329019', '陈丽', '', 0, '', '', '12329019', '', '2013-09-20', 'S', '', ''),
('12329027', '陈雪', '', 0, '', '', '12329027', '', '2013-09-20', 'S', '', ''),
('12329028', '陈雪婷', '', 0, '', '', '12329028', '', '2013-09-20', 'S', '', ''),
('12329054', '何冰妮', '', 0, '', '', '12329054', '', '2013-09-20', 'S', '', ''),
('12329091', '黎美欣', '', 0, '', '', '12329091', '', '2013-09-20', 'S', '', ''),
('12329125', '刘亚男', '', 0, '', '', '12329125', '', '2013-09-20', 'S', '', ''),
('12329134', '莫泽江', '', 0, '', '', '12329134', '', '2013-09-20', 'S', '', ''),
('12329161', '陶伟', '', 0, '', '', '12329161', '', '2013-09-20', 'S', '', ''),
('12329172', '王茜', '', 0, '', '', '12329172', '', '2013-09-20', 'S', '', ''),
('12329182', '文童', '', 0, '', '', '12329182', '', '2013-09-20', 'S', '', ''),
('12329183', '吴艾佳', '', 0, '', '', '12329183', '', '2013-09-20', 'S', '', ''),
('12329188', '吴仁武', '', 0, '', '', '12329188', '', '2013-09-20', 'S', '', ''),
('12329190', '吴涛', '', 0, '', '', '12329190', '', '2013-09-20', 'S', '', ''),
('12329196', '谢城锋', '', 0, '', '', '12329196', '', '2013-09-20', 'S', '', ''),
('12329226', '叶晓娜', '', 0, '', '', '12329226', '', '2013-09-20', 'S', '', ''),
('12337016', '吴敏雄', '', 0, '', '', '12337016', '', '2013-09-20', 'S', '', ''),
('12337019', '谢凌', '', 0, '', '', '12337019', '', '2013-09-20', 'S', '', ''),
('12337026', '张慧薇', '', 0, '', '', '12337026', '', '2013-09-20', 'S', '', ''),
('12337028', '张晓宇', '', 0, '', '', '12337028', '', '2013-09-20', 'S', '', ''),
('12353010', '陈慧雅', '', 0, '', '', '12353010', '', '2013-09-20', 'S', '', ''),
('12353046', '耿建豪', '', 0, '', '', '12353046', '', '2013-09-20', 'S', '', ''),
('12353048', '龚睿奇', '', 0, '', '', '12353048', '', '2013-09-20', 'S', '', ''),
('12353049', '龚炜珺', '', 0, '', '', '12353049', '', '2013-09-20', 'S', '', ''),
('12353087', '柯康银', '', 0, '', '', '12353087', '', '2013-09-20', 'S', '', ''),
('12353090', '雷怡南', '', 0, '', '', '12353090', '', '2013-09-20', 'S', '', ''),
('12353107', '李钰骙', '', 0, '', '', '12353107', '', '2013-09-20', 'S', '', ''),
('12353122', '林之杰', '', 0, '', '', '12353122', '', '2013-09-20', 'S', '', ''),
('12353123', '凌璐※', '', 0, '', '', '12353123', '', '2013-09-20', 'S', '', ''),
('12353127', '刘伦', '', 0, '', '', '12353127', '', '2013-09-20', 'S', '', ''),
('12353128', '刘明妹', '', 0, '', '', '12353128', '', '2013-09-20', 'S', '', ''),
('12353136', '刘跃华', '', 0, '', '', '12353136', '', '2013-09-20', 'S', '', ''),
('12353139', '卢晓燕', '', 0, '', '', '12353139', '', '2013-09-20', 'S', '', ''),
('12353145', '罗雅悠', '', 0, '', '', '12353145', '', '2013-09-20', 'S', '', ''),
('12353156', '聂诗玥', '', 0, '', '', '12353156', '', '2013-09-20', 'S', '', ''),
('12353161', '彭俊人', '', 0, '', '', '12353161', '', '2013-09-20', 'S', '', ''),
('12353166', '钱雪琪', '', 0, '', '', '12353166', '', '2013-09-20', 'S', '', ''),
('12353182', '孙贤达', '', 0, '', '', '12353182', '', '2013-09-20', 'S', '', ''),
('12353194', '王芮浩', '', 0, '', '', '12353194', '', '2013-09-20', 'S', '', ''),
('12353200', '王悦旻', '', 0, '', '', '12353200', '', '2013-09-20', 'S', '', ''),
('12353204', '温伟韬', '', 0, '', '', '12353204', '', '2013-09-20', 'S', '', ''),
('12353213', '武亚坤', '', 0, '', '', '12353213', '', '2013-09-20', 'S', '', ''),
('12353217', '谢敏', '', 0, '', '', '12353217', '', '2013-09-20', 'S', '', ''),
('12353227', '徐雨枫', '', 0, '', '', '12353227', '', '2013-09-20', 'S', '', ''),
('12353228', '徐梓豪', '', 0, '', '', '12353228', '', '2013-09-20', 'S', '', ''),
('12353229', '许伟健', '', 0, '', '', '12353229', '', '2013-09-20', 'S', '', ''),
('12353233', '杨华源', '', 0, '', '', '12353233', '', '2013-09-20', 'S', '', ''),
('12353241', '姚灿武', '', 0, '', '', '12353241', '', '2013-09-20', 'S', '', ''),
('12353242', '姚伟和', '', 0, '', '', '12353242', '', '2013-09-20', 'S', '', ''),
('12353245', '叶剑武', '', 0, '', '', '12353245', '', '2013-09-20', 'S', '', ''),
('12353246', '叶双', '', 0, '', '', '12353246', '', '2013-09-20', 'S', '', ''),
('12353247', '易希倩', '', 0, '', '', '12353247', '', '2013-09-20', 'S', '', ''),
('12353286', '周颖岚', '', 0, '', '', '12353286', '', '2013-09-20', 'S', '', ''),
('12353288', '朱俊祺', '', 0, '', '', '12353288', '', '2013-09-20', 'S', '', ''),
('12353290', '朱琰', '', 0, '', '', '12353290', '', '2013-09-20', 'S', '', ''),
('13307110', '郭晓君', '', 0, '', '', '13307110', '', '2013-09-20', 'S', '', ''),
('13307111', '郭彦', '', 0, '', '', '13307111', '', '2013-09-20', 'S', '', ''),
('13307160', '姜雪晨', '', 0, '', '', '13307160', '', '2013-09-20', 'S', '', ''),
('13307174', '黎雪玲', '', 0, '', '', '13307174', '', '2013-09-20', 'S', '', ''),
('13307306', '欧阳思璇', '', 0, '', '', '13307306', '', '2013-09-20', 'S', '', ''),
('13317050', '李嘉喆', '', 0, '', '', '13317050', '', '2013-09-20', 'S', '', ''),
('13318019', '陳祖曦', '', 0, '', '', '13318019', '', '2013-09-20', 'S', '', ''),
('13318068', '廖盛君', '', 0, '', '', '13318068', '', '2013-09-20', 'S', '', ''),
('13318084', '罗树涵', '', 0, '', '', '13318084', '', '2013-09-20', 'S', '', ''),
('13319020', '黄安定', '', 0, '', '', '13319020', '', '2013-09-20', 'S', '', ''),
('13329029', '余秋言', '', 0, '', '', '13329029', '', '2013-09-20', 'S', '', ''),
('13330041', '郭倩敏', '', 0, '', '', '13330041', '', '2013-09-20', 'S', '', ''),
('13330044', '韩菲', '', 0, '', '', '13330044', '', '2013-09-20', 'S', '', ''),
('13330130', '龙雯俐', '', 0, '', '', '13330130', '', '2013-09-20', 'S', '', ''),
('13354016', '陈鸿', '', 0, '', '', '13354016', '', '2013-09-20', 'S', '', ''),
('13354026', '陈龙', '', 0, '', '', '13354026', '', '2013-09-20', 'S', '', ''),
('13354065', '方泽华', '', 0, '', '', '13354065', '', '2013-09-20', 'S', '', ''),
('13354092', '何通', '', 0, '', '', '13354092', '', '2013-09-20', 'S', '', ''),
('13354107', '黄国杰', '', 0, '', '', '13354107', '', '2013-09-20', 'S', '', ''),
('13354160', '李铭', '', 0, '', '', '13354160', '', '2013-09-20', 'S', '', ''),
('13354174', '李钰婷', '', 0, '', '', '13354174', '', '2013-09-20', 'S', '', ''),
('13354177', '李梓铭', '', 0, '', '', '13354177', '', '2013-09-20', 'S', '', ''),
('13354274', '潘梦琦', '', 0, '', '', '13354274', '', '2013-09-20', 'S', '', ''),
('13354299', '宋偲', '', 0, '', '', '13354299', '', '2013-09-20', 'S', '', ''),
('13354325', '王健铮', '', 0, '', '', '13354325', '', '2013-09-20', 'S', '', ''),
('13354353', '吴冰龙', '', 0, '', '', '13354353', '', '2013-09-20', 'S', '', ''),
('13354491', '庄耿行', '', 0, '', '', '13354491', '', '2013-09-20', 'S', '', '');

--
-- 限制导出的表
--

--
-- 限制表 `Administrator`
--
ALTER TABLE `Administrator`
  ADD CONSTRAINT `Administrator_ibfk_1` FOREIGN KEY (`Ano`) REFERENCES `User` (`UID`);

--
-- 限制表 `CexerciseAnswerForstudent`
--
ALTER TABLE `CexerciseAnswerForstudent`
  ADD CONSTRAINT `CexerciseAnswerForstudent_ibfk_2` FOREIGN KEY (`Chno`) REFERENCES `Exam` (`Hno`),
  ADD CONSTRAINT `CexerciseAnswerForstudent_ibfk_3` FOREIGN KEY (`Sno`) REFERENCES `Student` (`Sno`),
  ADD CONSTRAINT `CexerciseAnswerForstudent_ibfk_4` FOREIGN KEY (`Ceno`) REFERENCES `Cexercise` (`Ceno`);

--
-- 限制表 `ExamAnswerForStudent`
--
ALTER TABLE `ExamAnswerForStudent`
  ADD CONSTRAINT `ExamAnswerForStudent_ibfk_1` FOREIGN KEY (`Asno`) REFERENCES `Student` (`Sno`),
  ADD CONSTRAINT `ExamAnswerForStudent_ibfk_2` FOREIGN KEY (`Ahno`) REFERENCES `Exam` (`Hno`);

--
-- 限制表 `FillProblem`
--
ALTER TABLE `FillProblem`
  ADD CONSTRAINT `FillProblem_ibfk_1` FOREIGN KEY (`FPid`) REFERENCES `Cexercise` (`Ceno`);

--
-- 限制表 `Pexercise`
--
ALTER TABLE `Pexercise`
  ADD CONSTRAINT `Pexercise_ibfk_3` FOREIGN KEY (`Pcno`) REFERENCES `Chapter` (`Cno`),
  ADD CONSTRAINT `Pexercise_ibfk_4` FOREIGN KEY (`Pstyle`) REFERENCES `Knowledge` (`Kno`);

--
-- 限制表 `PexerciseAnswerForstudent`
--
ALTER TABLE `PexerciseAnswerForstudent`
  ADD CONSTRAINT `PexerciseAnswerForstudent_ibfk_1` FOREIGN KEY (`Peno`) REFERENCES `Pexercise` (`Peno`),
  ADD CONSTRAINT `PexerciseAnswerForstudent_ibfk_2` FOREIGN KEY (`Psno`) REFERENCES `Student` (`Sno`),
  ADD CONSTRAINT `PexerciseAnswerForstudent_ibfk_3` FOREIGN KEY (`Phno`) REFERENCES `Exam` (`Hno`);

--
-- 限制表 `Teacher`
--
ALTER TABLE `Teacher`
  ADD CONSTRAINT `Teacher_ibfk_1` FOREIGN KEY (`Tno`) REFERENCES `User` (`UID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
