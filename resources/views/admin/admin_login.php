<div class="col-4 col-m-5 col-s-6 m-a">
    <div class="p-10 m-5">
        <div class="b-one b-r-8">
            <div class="">
                <div class="">
                    <?php

                    use Students\John\Templates\Form;

                    $form = new Form();
                    $form::begin('/admin/login', 'post');

                    echo sprintf('
                        <div>
                            <div class="p-3-0">
                                %s 
                            </div>
                            
                            <div class="p-3-0">
                                %s 
                            </div>
                            
                            <div class="p-10-0">
                                <button class="b-one p-10-20 bg-button-1 c-white">Login</button>
                            </div>
                            <input type="checkbox" id="checkbox" onclick="togglePwd()">
                            <label class="prevent-select" for="checkbox" style="text-align: center;">Show password</label>
                        </div>
                    
                    ',
                        $form::field('email')->email(),
                        $form::field('password')->password()

                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>