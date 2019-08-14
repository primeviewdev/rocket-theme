
<?php
/**
 * Template Name: VueJS template
 **/
get_header(); ?>
<div class="homepage site-content">
    <div class="layer layer_slider">
        <?php echo do_shortcode('[soliloquy id="24"]'); ?>
    </div>
    <div id="app-vue">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-12">
                    <div 
                        v-if="showAlert" 
                        v-bind:class="alertType"
                        class="alert alert-dismissible fade show" 
                        role="alert">
                        <p>{{ alertMsg }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Job Title</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in infos" :key="index">
                                <td>{{ item.fname }}</td>
                                <td>{{ item.lname }}</td>
                                <td>{{ item.job_title }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" v-model="fname" name="fname">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" v-model="lname" name="lname">
                    </div>
                    <div class="form-group">
                        <label>Job</label>
                        <input type="text" class="form-control" v-model="job" name="job">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" v-on:click="insertData">Insert Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layer layer_2">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar('home-layer-2'); ?>
            </div>
        </div>
    </div>
    <div class="layer layer_3">
        <div class="container title_container">
            <div class="row">
                <?php dynamic_sidebar('home-layer-3-1'); ?>
            </div>
        </div>
        <div class="container content_container">
            <div class="row">
                <?php dynamic_sidebar('home-layer-3-2'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
