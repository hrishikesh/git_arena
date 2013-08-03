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
                    <div id="activityList">
                        <?php if (!empty($commits)) { ?>
                        <ul class="commitsWrap">
                            <?php foreach ($commits as $commit) { ?>
                            <li class="clearfix">
                                <div class="commitUser">
                                    <img src="/app/webroot/img/default-pic.png" alt="user default pic"/>
                                </div>
                                <div class="commitsDetails">
                                    <p><span><?php echo $commit['commit']['committer']['name'];?></span> has commited
                                        the code on branch <span>Develop</span>
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
                    </div>
                </div>
                <div class="tabContent hide" id="tabGraph">
                    <div class="teamBtnWrap clearfix">
                        <div class="teamBtn active">Team 1</div>
                        <div class="teamBtn">Team 2</div>
                        <div class="teamBtn">Team 3</div>
                        <div class="teamBtn">Team 4</div>
                    </div>
                    <div class="chartsWrap" id="detailChart">

                    </div>
                </div>
            </div>
        </div>
        <div class="feedsWrap">
            <h3>See Recent Activities</h3>
            <?php echo $this->element('repository_list');?>
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
                    $('#activityList').html(data);
                },
                error:function (xhr, desc, err) {
//                        console.log(xhr);
//                        console.log("Desc: " + desc + "\nErr:" + err);
                }
            });

        });

    });
</script>
