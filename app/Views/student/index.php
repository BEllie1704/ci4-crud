<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management System</title>
</head>
<body>

    <h1>Student List</h1>

    <?php if (session()->getFlashdata('status')): ?>
        <div style="color: green; margin-bottom: 15px; font-weight: bold;">
            <?= session()->getFlashdata('status') ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('students/create') ?>">Add New Student</a>

    <table border="1" cellpadding="10" style="margin-top: 20px; border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($students) && is_array($students)): ?>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['course'] ?></td>
                    <td>
                        <a href="<?= base_url('students/delete/' . $student['id']) ?>" 
                           onclick="return confirm('Are you sure you want to delete this student?')"
                           style="color: red;">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No students found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?= $pager->links() ?>
    </div>

</body>
</html>