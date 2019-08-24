<html>
<head>
    <title>CRUD</title>
</head>
<body>
    <?php if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
    }?>
    <?php echo form_open('crud/updateStudent','','')?>
    <label>Full Name</label>

    <?php
    echo form_input('fullName',$stdRecord[0]['fullName'], 'clas="muclass"');
    echo form_hidden('userId',$stdRecord[0]['id'],'');
    ?>

    <label>email</label>
    <?php
    echo form_input('email',$stdRecord[0]['email'], 'clas="muclass"');
    ?>
    <label>age</label>
    <?php
    echo form_input('age',$stdRecord[0]['age'], 'clas="muclass"');
    ?>
    <?php
    echo form_submit('update','update','');
    ?>
    <?php echo form_close();?>
</body>
</html>