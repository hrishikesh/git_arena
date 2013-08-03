<?php if (!empty($commits)) { ?>
<ul class="commitsWrap">
    <?php foreach ($commits as $commit) { ?>
    <li class="clearfix">
        <div class="commitUser">
            <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
        </div>
        <div class="commitsDetails">
            <p><span><?php echo $commit['commit']['committer']['name'];?></span> has commited the code on branch <span>Develop</span>
            </p>

            <div class="currentCommits">
                <span>Commit: </span>"<?php echo $commit['commit']['message'];?>"
            </div>
        </div>
        <div class="dateTimeWrap">
            <p>26-08-2013</p>

            <p>09:30 am</p>
        </div>
    </li>
    <?php }?>
</ul>
<?php } ?>