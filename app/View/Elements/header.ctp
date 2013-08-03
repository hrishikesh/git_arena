<div class="headerWrap gradient">
    <div class="container clearfix">
        <a href="javascript: void(0)" class="logoWrap">
            <img src="/app/webroot/img/Logo_transparent.png" alt="logo image"/>
        </a>

        <h3><a href="javascript: void(0)"><span>Git</span> Arena</a></h3>

        <div class="logOptionWrap clearfix">
            <ul class="loginOption clearfix">
                <!--                <li>-->
                <!--                    <a href="javascript: void(0)" class="profileView"><span><img class="userImage" src="/app/webroot/img/default-pic.png" alt="User Image" /></span>Profile</a>-->
                <!--                </li>-->
                <li>
                    <?php
                    if (!empty($authUser)) {
                        echo $this->Html->link(__($this->Html->tag('i',
                                    '',
                                    array('class' => 'iconLogout')) . 'Sign Out',
                                true),
                            array(
                                 'controller' => 'users',
                                 'action'     => 'logout'
                            ),
                            array('escape' => false));

                    }
                    ?></li>
            </ul>
        </div>
    </div>
</div>