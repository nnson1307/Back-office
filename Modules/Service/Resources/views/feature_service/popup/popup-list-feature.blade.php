<form id="form-reset-password">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="10%">
                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                        <input type="checkbox" name="feature_group_all" onclick="service.checkAllFeatureGroup(this)">
                        <span></span>
                    </label>
                </th>
                <th width="90%">
                    @lang('service::service.table.FEATURE_NAME')
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($list))
                @foreach($list as $item)
                    <tr>
                        <td>
                            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                <input type="checkbox" name="feature_group" value="{{$item['feature_group_id']}}">
                                <span></span>
                            </label>
                        </td>
                        <td>
                            @if($item['feature_group_name_redefine'] == null)
                                {{$item['feature_group_name_vi']}}
                            @else
                                {{$item['feature_group_name_redefine']}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</form>

