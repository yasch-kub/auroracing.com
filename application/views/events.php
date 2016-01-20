<div class="row">
    <div class="col-lg-8">
        <h1>Blog Post Title</h1>
        <p class="lead">
            by <a href="#">Start Bootstrap</a>
        </p>
        <hr>
        <p>
            <i class="fa fa-clock-o"></i>
            Posted on August 24, 2013 at 9:00 PM
        </p>
        <hr>
        <div id="slider">
            <div class="col-md-1 arrow">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="col-md-10" id="slidePhoto">
                <div id="containerPhoto">
                    {% for photo in post.photos %}
                    <div>
                        <a href="#" class="thumbnail">
                            <img num="{{ loop.index + 1}}" src="/application/data/posts/{{post.id}}/photos/{{photo}}">
                        </a>
                    </div>
                    {% endfor %}
                </div>
            </div>
            <div class="col-md-1 arrow">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <hr>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error
            quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum
            minus inventore?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste
            ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus,
            voluptatibus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius
            illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim,
            iure!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat
            totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam
            tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui,
            necessitatibus, est!</p>
        <hr>
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <hr>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">
                    Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
                purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">
                    Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                vulputate
                fringilla. Donec lacinia congue felis in faucibus.
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo.
                        Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                        nisi
                        vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination-->

    </div>
    <!--Search-->
    <div class="col-md-4">
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    What type of services do you provide on the marketplaces?                                                            <span class="label label-primary">Required</span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-9" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Programming" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-10" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Graphic Design" disabled="">
                        </div>
                    </div>
                </div>
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-11" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Music Making" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-12" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="3D Design" disabled="">
                        </div>
                    </div>

                </div>
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-13" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Support" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-14" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Other" disabled="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-offset-5 col-md-6">
        <ul class="pagination">
            <li><a href="#">1</a></li>
            <li class="active"><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
        </ul>
    </div>
</div>