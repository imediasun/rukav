



                <form style="" class="badges_form needs-validation" id="badge_form_{{$message->id}}">

                    <h3 class="badge_name"></h3>

                    <input type="hidden" class="sending_badge_user" value="">
                    <div class="form-group personal_select" >
                        <label class="form-label" >
                            Выберите вложенную категорию
                        </label>
                        <?

                        $subcats=\App\Domain\Customer\Models\ProductCategory::where('parent_id',$message->id)->get();

                        ?>
                        <div class="form-group">
                            <select data-placeholder="Select a state..." class="js-select2-icons form-control category_select" id="multiple-icons_{{$message->id}}" >
                                <optgroup label="Подкатегории">

                                    @foreach($subcats as $cat)
                                        <option value="{{$cat->id}}" data-icon="fa {{$cat->icon}} text-dark" selected="">{{$cat->name}}</option>
                                    @endforeach

                                </optgroup>

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="name-f">Контактная информация по объявлению</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                </div>
                                <input type="text" aria-label="First name" class="form-control email_input" required placeholder="Email" id="name-f">
                                <input type="text" aria-label="Last name" class="form-control phone_input" required placeholder="Phone" id="name-l">
                            </div>
                        </div>

                        <div class="form-group auto_complete_form_group">


                        </div>
                        <div class="form-group">
                            <label class="form-label" for="price-f">Дополнительная информация по объявлению</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text text-success">
                                                            <i class="ni ni-user fs-xl"></i>
                                                        </span>
                                </div>
                                <input type="text" aria-label="First name" class="form-control price_input" required placeholder="Цена(необязательно)" id="price-f">
                                <input type="text" aria-label="Last name" class="form-control title_input" required placeholder="Название" id="tytle-l">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">

                    </div>

                    <div class="form-group">

                        <input type="hidden" class="form-control sending_badge_title" value="" />
                    </div>
                    <div class="form-group photo_form_place"></div>
                    <label class="form-label" for="example-textarea">Сопроводительный текст</label>
                    <div class="form-group summerBlock">



                        <!--textarea class="form-control sending_badge_textarea"  rows="5"></textarea-->
                    </div>

                    <button type="submit"  data-target="#getCroppedCanvasModal_{{$message->id}}"  data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" class=" sending_badge_submit btn btn-primary waves-effect waves-themed">Отправить объявление</button>
                </form>





