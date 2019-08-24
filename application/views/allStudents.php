<html>
<head>
    <title>CRUD</title>
</head>
<body>
    <?php if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
    }?>
    <table border="1">
        <?php if($allStudents->num_rows() > 0):
            foreach($allStudents->result() as $student):
            ?>
                <tr>
                    <td>
                        <?php echo $student->id?>
                    </td>
                    <td>
                        <?php echo $student->fullName?>
                    </td>
                    <td>
                        <?php echo $student->age?>
                    </td>
                    <td>
                        <?php echo $student->email?>
                    </td>
                    <td>
                        <?php echo $student->date?>
                    </td>
                    <td>
                        <a href="<?php echo site_url('crud/editStudent/'.$student->id)?>">Edit</a>
                    </td>
                    <td>
                        <a href="<?php echo site_url('crud/deleteStudent/'.$student->id)?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            Students not exist.
        <?php endif; ?>
    </table>
<a href="<?php echo site_url('crud')?>">Insert Student</a>
</body>
</html>