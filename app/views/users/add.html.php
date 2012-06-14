<?=$this->form->create(null); ?>
    <?=$this->form->field('username'); ?>
    <?=$this->form->field('password', array('type' => 'password')); ?>
    <?=$this->form->field( array( 'email' => 'E-Mail Address: ' ) ); ?>
    <?=$this->form->field( array( 'fName' => 'First Name: ' ) ); ?>
    <?=$this->form->field( array( 'lName' => 'Last Name: ' ) ); ?>
    <br />
    <h3>Social Accounts:</h3>
    <br />
    <?=$this->form->field( array( 'profile.twitter' => 'Twitter Url: ' ) ); ?>
    <?=$this->form->field( array( 'profile.gplus' => 'Google Plus Url: ' ) ); ?>
    <?=$this->form->field( array( 'profile.facebook' => 'Facebook Url: ' ) ); ?>
    <?=$this->form->field( array( 'profile.github' => 'GitHub Url: ' ) ); ?>
    <?php ( isset($addUser) && $addUser ) ? $btnText = 'Add User' : $btnText = 'Sign Up'?>
    <?=$this->form->submit( $btnText ); ?>
<?=$this->form->end(); ?>
