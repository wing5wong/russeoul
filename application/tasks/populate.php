<?php

class Populate_Task {

    public function run($arguments)
    {

        // add roles
        $studentRole = Role::create(array('name'=>'Student'))->id;
        $teacherRole = Role::create(array('name'=>'Teacher'))->id;
        $adminRole = Role::create(array('name'=>'Admin'))->id;


        // add courses
        $gen_am_course = Course::create(array('name'=>'Gen am'));
        $gen_pm_course = Course::create(array('name'=>'Gen pm'));
        $yl_am_course = Course::create(array('name'=>'YL am'));
        $yl_pm_course = Course::create(array('name'=>'YL pm'));
        

        // the course ids
        $gen_am = $gen_am_course->id;
        $gen_pm = $gen_pm_course->id;
        $yl_am = $yl_am_course->id;
        $yl_pm = $yl_pm_course->id;


        $courses = array('Gen am','Gen pm', 'YL am', 'YL pm');

        foreach($courses as $course)
        {


            switch($course)
            {
                case 'Gen am':
                for ($i = 1; $i <= 60; $i++)
                {
                    $lesson = new Lesson;
                    $lesson->name ="$course: Lesson $i";

                    $gen_am_course->lessons()->insert($lesson);
                }
                break;

                case 'Gen pm':
                for ($i = 1; $i <= 60; $i++)
                {
                    $lesson = new Lesson;
                    $lesson->name ="$course: Lesson $i";

                    $gen_pm_course->lessons()->insert($lesson);
                }
                break;

                case 'YL am':
                for ($i = 1; $i <= 40; $i++)
                {
                    $lesson = new Lesson;
                    $lesson->name ="$course: Lesson $i";

                    $yl_am_course->lessons()->insert($lesson);
                }
                break;

                case 'YL am':
                for ($i = 1; $i <= 40; $i++)
                {
                    $lesson = new Lesson;
                    $lesson->name ="$course: Lesson $i";

                    $yl_pm_course->lessons()->insert($lesson);
                }
                break;
            }
        }

        // koreanlastname, koreanfirstname, lastname, firstname, phone, email, class
        $students = array(
            array('서','미숙','Seo','Misook','010-8466-2821','bluesummer1008@hanmail.net','Gen am'),
            array('서','미숙','Park','Yangsuk','010-6228-3382','parkryan@hanmail.net','Gen am'),
            array('서','미숙','Kim','Boyeon','010-9707-5607','bykim5607@hotmail.com','Gen am'),
            array('서','미숙','Kim','Sunmi','010-2724-0815','rolling73@naver.com','Gen am'),
            array('서','미숙','Jae-Won','Lee','010-6385-5893','realpsi@naver.com','Gen am'),
            array('서','미숙','Seo','Misook','010-7712-7004','sharday@chol.com','Gen am'),
            array('서','미숙','Seo','Misook','010-6888-5910','bydulky4@hanmail.ne','Gen am'),
            array('서','미숙','Seo','Misook','010-2791-8848','ojhjey@hanmail.net','YL pm'),
            array('서','미숙','Seo','Misook','010-2654-9491','yujinn0517@hanmail.net','YL pm'),
            array('서','미숙','Seo','Misook','010-2761-5785','daegiii2011@hanmail.net','YL pm'),
            );

        // lastname, firstname, phone, email, classes[],isAdmin
        $teachers = array(
            array('Anderson','Russell','0210677905','russell.ginue@gmail.com',array('Gen am', 'Gen pm', 'YL am', 'YL pm'),true),
            );



        //add students
        foreach($students as $student){

            //init new user
            $user = new User;
            $user->username = $student[5];
            $user->password = Hash::make('password');
            $user->save();

            //init new student
            $student_rec = new Student;
            $student_rec->firstName = $student[3];
            $student_rec->lastName = $student[2];
            $student_rec->koreanFirstName = $student[1];
            $student_rec->koreanLastName = $student[0];
            $student_rec->email = $student[5];
            $student_rec->phone = $student[4];

            //attach student to user
            $user->student()->insert($student_rec);
            //attach user to student role
            $user->roles()->attach($studentRole);

            //add student to course
            switch($student[6])
            {
                case 'Gen am':
                // attach student to course
                $student_rec->courses()->attach($gen_am);

                // attach student to each lesson in the course
                $lessons = $gen_am_course->lessons()->get();
                foreach($lessons as $lesson)
                {
                    $lesson->students()->attach($student_rec,array('present'=>'1'));
                }
                break;

                case 'Gen pm':
                $student_rec->courses()->attach($gen_pm);
                $lessons = $gen_pm_course->lessons()->get();
                foreach($lessons as $lesson)
                {
                    $lesson->students()->attach($student_rec,array('present'=>'1'));
                }
                break;

                case 'YL am':
                $student_rec->courses()->attach($yl_am);
                $lessons = $yl_am_course->lessons()->get();
                foreach($lessons as $lesson)
                {
                    $lesson->students()->attach($student_rec,array('present'=>'1'));
                }
                break;

                case 'YL am':
                $student_rec->courses()->attach($yl_pm);
                $lessons = $yl_pm_course->lessons()->get();
                foreach($lessons as $lesson)
                {
                    $lesson->students()->attach($student_rec,array('present'=>'1'));
                }
                break;
            }

        }



        // add teachers
        foreach($teachers as $teacher){

            //init new user
            $user = new User;
            $user->username = $teacher[3];
            $user->password = Hash::make('password');
            $user->save();

            //init new teacher
            $teacher_rec = new Teacher;
            $teacher_rec->firstName = $teacher[1];
            $teacher_rec->lastName = $teacher[0];
            $teacher_rec->email = $teacher[3];
            $teacher_rec->phone = $teacher[2];

            //attach teacher to user
            $user->teacher()->insert($teacher_rec);
            //attach user to teacher role
            $user->roles()->attach($teacherRole);

            //add admin role if last param = true
            if($teacher[5])
            {
                $user->roles()->attach($adminRole);

            }

            //add teacher to each course
            foreach($teacher[4] as $course)
            {

                switch($course)
                {
                    case 'Gen am':
                    $teacher_rec->courses()->attach($gen_am);
                    break;

                    case 'Gen pm':
                    $teacher_rec->courses()->attach($gen_pm);
                    break;

                    case 'YL am':
                    $teacher_rec->courses()->attach($yl_am);
                    break;

                    case 'YL pm':
                    $teacher_rec->courses()->attach($yl_pm);
                    break;
                }
            }
        }
    }
}