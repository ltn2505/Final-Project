<!DOCTYPE html>
<html>
<head>
    <title>Welcome to University of Greenwich</title>
</head>
<body>
    <p>Dear {{ $student->student_name }},</p>
    <p>We are thrilled to welcome you to University of Greenwich! You have successfully registered as a new student, and we're excited to have you join our community.</p>
    <p>At University of Greenwich, we're committed to providing our students with a high-quality education and a supportive learning environment. We believe that you will thrive here, and we can't wait to see all the amazing things you'll achieve.</p>
    <p>Here are a few important details to get you started:</p>
    <ul>
        <li>Your enrollment registration id: {{ $student->id }}</li>
        <li>Your name: {{ $student->student_name }}</li>
        <li>Your phone: {{ $student->mobile }}</li>
        <li>Email: {{ $student->email }}</li>
        <li>School Name: {{ $student->school_name }}</li>
        <li>Address: {{ $student->address }}</li>
        <li>Major: {{ $student->specialized_register }}</li>
        <li>Method: {{ $student->point->recruitment_method }}</li>
        <li>Block: {{ $student->point->exam_block }}</li>
        <li>Points: {{ $student->point->recruitment_points }}</li>
        <li>Question: {{ $student->description }}</li>
        <li>If you have any questions or concerns, please don't hesitate to reach out to us.</li>
    </ul>
    <p>We look forward to getting to know you and supporting you on your educational journey.</p>
    <p>Best regards,<br>University of Greenwich</p>
</body>
</html>
