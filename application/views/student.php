<html>
    <head>
        <title>CRUD</title>
    </head>
<body>
    <?php if($this->session->flashdata('message')){
        echo $this->session->flashdata('message');
    }?>
    <?php echo form_open('crud/newUser','','')?>
        <label>Full Name</label>
        <?php
            echo form_input('fullName','', 'clas="muclass"');
        ?>
        <label>email</label>
        <?php
            echo form_input('email','', 'clas="muclass"');
        ?>
        <label>password</label>

        <?php
            echo form_input('password','', 'clas="muclass"');
        ?>
        <label>age</label>


        <?php
            echo form_input('age','', 'clas="muclass"');
        ?>
        <?php
            echo form_submit('mysubmit','mysubmit','');
        ?>
    <?php echo form_close();?>
</body>
</html>