
<h3><?=$user->_id; ?></h3>
<h1><?=$this->html->link($user->username,'/users/edit/'.$user->_id); ?></h1>
<h3><?=$user->password; ?></h3>