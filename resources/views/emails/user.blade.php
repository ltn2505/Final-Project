<!DOCTYPE html>
<html>
<head>
    <title>University of Greenwich - New Register</title>
</head>
<body>
    <p>A new student has registered:</p>
    <ul>
        <li>Student enrollment registration id: {{ $student->id }}</li>
        <li>Student name: {{ $student->student_name }}</li>
        <li>Number phone: {{ $student->mobile }}</li>
        <li>Email: {{ $student->email }}</li>
        <li>School Name: {{ $student->school_name }}</li>
        <li>Address: {{ $student->address }}</li>
        <li>Major: {{ $student->specialized_register }}</li>
        <li>Method: {{ $student->point->recruitment_method }}</li>
        <li>Block: {{ $student->point->exam_block }}</li>
        <li>Points: {{ $student->point->recruitment_points }}</li>
        <li>Question: {{ $student->description }}</li>
    </ul>
</body>
</html>
