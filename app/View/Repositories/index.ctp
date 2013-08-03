<div class="mainContent">
    <div class="row upperContent">
        <div class="span8">
            <div class="dashboardUserWrap clearfix">
                <img src="/app/webroot/img/default-pic.png" alt="User Pictures">

                <div class="userInformation">
                    <p>Name</p>

                    <p>Email id</p>
                </div>
            </div>
            <div class="tabWrap">
                <ul class="clearfix">
                    <li><a href="#tabTable" class="activeTab">Activity Feeds</a></li>
                    <li><a href="#tabGraph">Graph Representation</a></li>
                </ul>
            </div>
            <div class="lowerTabContent">
                <div class="tabContent" id="tabTable">
                    <ul class="commitsWrap">
                        <li class="clearfix">
                            <div class="commitUser">
                                <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                            </div>
                            <div class="commitsDetails">
                                <p><span>Anamika</span> has commited the code on branch <span>Develop</span></p>

                                <div class="currentCommits">
                                    <span>Commit: </span>"login functionality implemented"
                                </div>
                            </div>
                            <div class="dateTimeWrap">
                                <p>26-08-2013</p>

                                <p>09:30 am</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="commitUser">
                                <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                            </div>
                            <div class="commitsDetails">
                                <p><span>Anamika</span> has commited the code on branch <span>Develop</span></p>

                                <div class="currentCommits">
                                    <span>Commit: </span>"login functionality implemented"
                                </div>
                            </div>
                            <div class="dateTimeWrap">
                                <p>26-08-2013</p>

                                <p>09:30 am</p>
                            </div>

                        </li>
                        <li class="clearfix">
                            <div class="commitUser">
                                <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                            </div>
                            <div class="commitsDetails">
                                <p><span>Anamika</span> has commited the code on branch <span>Develop</span></p>

                                <div class="currentCommits">
                                    <span>Commit: </span>"login functionality implemented"
                                </div>
                            </div>
                            <div class="dateTimeWrap">
                                <p>26-08-2013</p>

                                <p>09:30 am</p>
                            </div>

                        </li>
                        <li class="clearfix">
                            <div class="commitUser">
                                <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                            </div>
                            <div class="commitsDetails">
                                <p><span>Anamika</span> has commited the code on branch <span>Develop</span></p>

                                <div class="currentCommits">
                                    <span>Commit: </span>"login functionality implemented"
                                </div>
                            </div>
                            <div class="dateTimeWrap">
                                <p>26-08-2013</p>

                                <p>09:30 am</p>
                            </div>

                        </li>
                        <li class="clearfix">
                            <div class="commitUser">
                                <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                            </div>
                            <div class="commitsDetails">
                                <p><span>Anamika</span> has commited the code on branch <span>Develop</span></p>

                                <div class="currentCommits">
                                    <span>Commit: </span>"login functionality implemented"
                                </div>
                            </div>
                            <div class="dateTimeWrap">
                                <p>26-08-2013</p>

                                <p>09:30 am</p>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="tabContent" id="tabGraph">
                    <p>Graph comes here</p>
                </div>
            </div>
        </div>
        <div class="feedsWrap">
            <h3>See Recent Activities</h3>

            <div class="activeFeeds">
                <div class="listMainWrap">
                    <?php
                    if (!empty($repos['repositories'])) {
                        ?>
                        <ul>
                            <?php foreach ($repos['repositories'] as $key => $repo) {
                            ?>
                            <li>
                                <div class="recentFeeds clearfix openList" data-name="<?php echo $repo['name'];?>">
                                    <p><?php echo $repo['name'];?></p>
                                    <i class="iconRepresent"></i>
                                </div>
                                <ul class="dropDownList">
                                    <li>Anamika Verma</li>
                                    <li>Vijay Kumbhkar</li>
                                    <li>Vikas Singh</li>
                                    <li>Harshal Shinde</li>
                                    <li>Hrishikesh Ravekar</li>
                                    <li>Pankaj Khernar</li>
                                    <li>Pavan Avinash</li>
                                </ul>
                            </li>
                            <?php }?>
                        </ul>
                        <?php

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        //on change of no.of responses chosen
        $('.recentFeeds').click(function () {
            var repoName = $(this).attr('data-name');
            $.ajax({

                url:'<?php echo FULL_BASE_URL;?>/repositories/activity_feeds',
                type:'get',
                data:{repoName:repoName},
                success:function (data, status) {
                    $('#responseList').html(data);
                },
                error:function (xhr, desc, err) {
//                        console.log(xhr);
//                        console.log("Desc: " + desc + "\nErr:" + err);
                }
            });

        });

    });
</script>
