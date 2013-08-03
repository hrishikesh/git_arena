<?php
/**
 * @var view $this
 */
?>
<div class="loginBoxWrap">
    <h3>Welcome! to the <span>Git</span> Arena</h3>
    <div class="innerLoginBox">
        <div class="loginBox">
            <p>Here, you can access your repository and check your status.</p>
            <div class="messageWrap clearfix">
                <ul>
                    <li>Access your repo easily.</li>
                    <li>Single click and see your commits.</li>
                    <li>See your commits Graphical representation. </li>
                    <li>See group commits easily</li>
                </ul>
                <div class="loginBtnWrap">
                    <?php
                        echo $this->Html->link('Login', $REDIRECT_URL.$CLIENT_ID, array('class'=>'btn btn-success'));
                        echo $this->Html->link($this->Html->image('github_ico.png',array('alt'=>'Github Logo')), $REDIRECT_URL.$CLIENT_ID, array('class'=>'gitHub', 'escape'=>false));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="imgGit clearfix">
        <img class="imgMale imgGitUsers" src="/app/webroot/img/user1.png" alt="user1 pic">
        <img class="imgGroup imgGitUsers" src="/app/webroot/img/user_group.png" alt="user Group pic">
        <img class="imgGirl imgGitUsers" src="/app/webroot/img/user_girl.png" alt="user girl pic">
    </div>

</div>