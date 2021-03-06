<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection customerpeoples
     * @property Grid\Column|Collection buyerpeoples
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection tel
     * @property Grid\Column|Collection hp
     * @property Grid\Column|Collection wechat
     * @property Grid\Column|Collection sex
     * @property Grid\Column|Collection age
     * @property Grid\Column|Collection fax
     * @property Grid\Column|Collection buyer_id
     * @property Grid\Column|Collection creditcode
     * @property Grid\Column|Collection ceo
     * @property Grid\Column|Collection site
     * @property Grid\Column|Collection address
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection mytags
     * @property Grid\Column|Collection category
     * @property Grid\Column|Collection customer_id
     * @property Grid\Column|Collection to
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection tag
     * @property Grid\Column|Collection totime
     * @property Grid\Column|Collection Year
     * @property Grid\Column|Collection start
     * @property Grid\Column|Collection end
     * @property Grid\Column|Collection companyname
     * @property Grid\Column|Collection ostatus
     * @property Grid\Column|Collection province
     * @property Grid\Column|Collection city
     * @property Grid\Column|Collection district
     * @property Grid\Column|Collection owner
     * @property Grid\Column|Collection capital
     * @property Grid\Column|Collection startdate
     * @property Grid\Column|Collection oldname
     * @property Grid\Column|Collection industry
     * @property Grid\Column|Collection personal
     * @property Grid\Column|Collection scope
     * @property Grid\Column|Collection addresscheck
     * @property Grid\Column|Collection emailcheck
     * @property Grid\Column|Collection tel1
     * @property Grid\Column|Collection tel2
     * @property Grid\Column|Collection tel3
     * @property Grid\Column|Collection tel4
     * @property Grid\Column|Collection tel5
     * @property Grid\Column|Collection tel6
     * @property Grid\Column|Collection tel7
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection url
     * @property Grid\Column|Collection active
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection ip_address
     * @property Grid\Column|Collection user_agent
     * @property Grid\Column|Collection last_activity
     * @property Grid\Column|Collection tag_id
     * @property Grid\Column|Collection taggable_type
     * @property Grid\Column|Collection taggable_id
     * @property Grid\Column|Collection sequence
     * @property Grid\Column|Collection batch_id
     * @property Grid\Column|Collection family_hash
     * @property Grid\Column|Collection should_display_on_index
     * @property Grid\Column|Collection entry_uuid
     * @property Grid\Column|Collection email_verified_at
     * @property Grid\Column|Collection two_factor_secret
     * @property Grid\Column|Collection two_factor_recovery_codes
     * @property Grid\Column|Collection current_team_id
     * @property Grid\Column|Collection profile_photo_path
     * @property Grid\Column|Collection jobId
     * @property Grid\Column|Collection personal_name
     * @property Grid\Column|Collection total_Personal
     *
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection customerpeoples(string $label = null)
     * @method Grid\Column|Collection buyerpeoples(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection tel(string $label = null)
     * @method Grid\Column|Collection hp(string $label = null)
     * @method Grid\Column|Collection wechat(string $label = null)
     * @method Grid\Column|Collection sex(string $label = null)
     * @method Grid\Column|Collection age(string $label = null)
     * @method Grid\Column|Collection fax(string $label = null)
     * @method Grid\Column|Collection buyer_id(string $label = null)
     * @method Grid\Column|Collection creditcode(string $label = null)
     * @method Grid\Column|Collection ceo(string $label = null)
     * @method Grid\Column|Collection site(string $label = null)
     * @method Grid\Column|Collection address(string $label = null)
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection mytags(string $label = null)
     * @method Grid\Column|Collection category(string $label = null)
     * @method Grid\Column|Collection customer_id(string $label = null)
     * @method Grid\Column|Collection to(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection tag(string $label = null)
     * @method Grid\Column|Collection totime(string $label = null)
     * @method Grid\Column|Collection Year(string $label = null)
     * @method Grid\Column|Collection start(string $label = null)
     * @method Grid\Column|Collection end(string $label = null)
     * @method Grid\Column|Collection companyname(string $label = null)
     * @method Grid\Column|Collection ostatus(string $label = null)
     * @method Grid\Column|Collection province(string $label = null)
     * @method Grid\Column|Collection city(string $label = null)
     * @method Grid\Column|Collection district(string $label = null)
     * @method Grid\Column|Collection owner(string $label = null)
     * @method Grid\Column|Collection capital(string $label = null)
     * @method Grid\Column|Collection startdate(string $label = null)
     * @method Grid\Column|Collection oldname(string $label = null)
     * @method Grid\Column|Collection industry(string $label = null)
     * @method Grid\Column|Collection personal(string $label = null)
     * @method Grid\Column|Collection scope(string $label = null)
     * @method Grid\Column|Collection addresscheck(string $label = null)
     * @method Grid\Column|Collection emailcheck(string $label = null)
     * @method Grid\Column|Collection tel1(string $label = null)
     * @method Grid\Column|Collection tel2(string $label = null)
     * @method Grid\Column|Collection tel3(string $label = null)
     * @method Grid\Column|Collection tel4(string $label = null)
     * @method Grid\Column|Collection tel5(string $label = null)
     * @method Grid\Column|Collection tel6(string $label = null)
     * @method Grid\Column|Collection tel7(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection url(string $label = null)
     * @method Grid\Column|Collection active(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection ip_address(string $label = null)
     * @method Grid\Column|Collection user_agent(string $label = null)
     * @method Grid\Column|Collection last_activity(string $label = null)
     * @method Grid\Column|Collection tag_id(string $label = null)
     * @method Grid\Column|Collection taggable_type(string $label = null)
     * @method Grid\Column|Collection taggable_id(string $label = null)
     * @method Grid\Column|Collection sequence(string $label = null)
     * @method Grid\Column|Collection batch_id(string $label = null)
     * @method Grid\Column|Collection family_hash(string $label = null)
     * @method Grid\Column|Collection should_display_on_index(string $label = null)
     * @method Grid\Column|Collection entry_uuid(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     * @method Grid\Column|Collection two_factor_secret(string $label = null)
     * @method Grid\Column|Collection two_factor_recovery_codes(string $label = null)
     * @method Grid\Column|Collection current_team_id(string $label = null)
     * @method Grid\Column|Collection profile_photo_path(string $label = null)
     * @method Grid\Column|Collection jobId(string $label = null)
     * @method Grid\Column|Collection personal_name(string $label = null)
     * @method Grid\Column|Collection total_Personal(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection customerpeoples
     * @property Show\Field|Collection buyerpeoples
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection email
     * @property Show\Field|Collection tel
     * @property Show\Field|Collection hp
     * @property Show\Field|Collection wechat
     * @property Show\Field|Collection sex
     * @property Show\Field|Collection age
     * @property Show\Field|Collection fax
     * @property Show\Field|Collection buyer_id
     * @property Show\Field|Collection creditcode
     * @property Show\Field|Collection ceo
     * @property Show\Field|Collection site
     * @property Show\Field|Collection address
     * @property Show\Field|Collection status
     * @property Show\Field|Collection mytags
     * @property Show\Field|Collection category
     * @property Show\Field|Collection customer_id
     * @property Show\Field|Collection to
     * @property Show\Field|Collection content
     * @property Show\Field|Collection tag
     * @property Show\Field|Collection totime
     * @property Show\Field|Collection Year
     * @property Show\Field|Collection start
     * @property Show\Field|Collection end
     * @property Show\Field|Collection companyname
     * @property Show\Field|Collection ostatus
     * @property Show\Field|Collection province
     * @property Show\Field|Collection city
     * @property Show\Field|Collection district
     * @property Show\Field|Collection owner
     * @property Show\Field|Collection capital
     * @property Show\Field|Collection startdate
     * @property Show\Field|Collection oldname
     * @property Show\Field|Collection industry
     * @property Show\Field|Collection personal
     * @property Show\Field|Collection scope
     * @property Show\Field|Collection addresscheck
     * @property Show\Field|Collection emailcheck
     * @property Show\Field|Collection tel1
     * @property Show\Field|Collection tel2
     * @property Show\Field|Collection tel3
     * @property Show\Field|Collection tel4
     * @property Show\Field|Collection tel5
     * @property Show\Field|Collection tel6
     * @property Show\Field|Collection tel7
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection url
     * @property Show\Field|Collection active
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection ip_address
     * @property Show\Field|Collection user_agent
     * @property Show\Field|Collection last_activity
     * @property Show\Field|Collection tag_id
     * @property Show\Field|Collection taggable_type
     * @property Show\Field|Collection taggable_id
     * @property Show\Field|Collection sequence
     * @property Show\Field|Collection batch_id
     * @property Show\Field|Collection family_hash
     * @property Show\Field|Collection should_display_on_index
     * @property Show\Field|Collection entry_uuid
     * @property Show\Field|Collection email_verified_at
     * @property Show\Field|Collection two_factor_secret
     * @property Show\Field|Collection two_factor_recovery_codes
     * @property Show\Field|Collection current_team_id
     * @property Show\Field|Collection profile_photo_path
     * @property Show\Field|Collection jobId
     * @property Show\Field|Collection personal_name
     * @property Show\Field|Collection total_Personal
     *
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection customerpeoples(string $label = null)
     * @method Show\Field|Collection buyerpeoples(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection tel(string $label = null)
     * @method Show\Field|Collection hp(string $label = null)
     * @method Show\Field|Collection wechat(string $label = null)
     * @method Show\Field|Collection sex(string $label = null)
     * @method Show\Field|Collection age(string $label = null)
     * @method Show\Field|Collection fax(string $label = null)
     * @method Show\Field|Collection buyer_id(string $label = null)
     * @method Show\Field|Collection creditcode(string $label = null)
     * @method Show\Field|Collection ceo(string $label = null)
     * @method Show\Field|Collection site(string $label = null)
     * @method Show\Field|Collection address(string $label = null)
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection mytags(string $label = null)
     * @method Show\Field|Collection category(string $label = null)
     * @method Show\Field|Collection customer_id(string $label = null)
     * @method Show\Field|Collection to(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection tag(string $label = null)
     * @method Show\Field|Collection totime(string $label = null)
     * @method Show\Field|Collection Year(string $label = null)
     * @method Show\Field|Collection start(string $label = null)
     * @method Show\Field|Collection end(string $label = null)
     * @method Show\Field|Collection companyname(string $label = null)
     * @method Show\Field|Collection ostatus(string $label = null)
     * @method Show\Field|Collection province(string $label = null)
     * @method Show\Field|Collection city(string $label = null)
     * @method Show\Field|Collection district(string $label = null)
     * @method Show\Field|Collection owner(string $label = null)
     * @method Show\Field|Collection capital(string $label = null)
     * @method Show\Field|Collection startdate(string $label = null)
     * @method Show\Field|Collection oldname(string $label = null)
     * @method Show\Field|Collection industry(string $label = null)
     * @method Show\Field|Collection personal(string $label = null)
     * @method Show\Field|Collection scope(string $label = null)
     * @method Show\Field|Collection addresscheck(string $label = null)
     * @method Show\Field|Collection emailcheck(string $label = null)
     * @method Show\Field|Collection tel1(string $label = null)
     * @method Show\Field|Collection tel2(string $label = null)
     * @method Show\Field|Collection tel3(string $label = null)
     * @method Show\Field|Collection tel4(string $label = null)
     * @method Show\Field|Collection tel5(string $label = null)
     * @method Show\Field|Collection tel6(string $label = null)
     * @method Show\Field|Collection tel7(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection url(string $label = null)
     * @method Show\Field|Collection active(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection ip_address(string $label = null)
     * @method Show\Field|Collection user_agent(string $label = null)
     * @method Show\Field|Collection last_activity(string $label = null)
     * @method Show\Field|Collection tag_id(string $label = null)
     * @method Show\Field|Collection taggable_type(string $label = null)
     * @method Show\Field|Collection taggable_id(string $label = null)
     * @method Show\Field|Collection sequence(string $label = null)
     * @method Show\Field|Collection batch_id(string $label = null)
     * @method Show\Field|Collection family_hash(string $label = null)
     * @method Show\Field|Collection should_display_on_index(string $label = null)
     * @method Show\Field|Collection entry_uuid(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     * @method Show\Field|Collection two_factor_secret(string $label = null)
     * @method Show\Field|Collection two_factor_recovery_codes(string $label = null)
     * @method Show\Field|Collection current_team_id(string $label = null)
     * @method Show\Field|Collection profile_photo_path(string $label = null)
     * @method Show\Field|Collection jobId(string $label = null)
     * @method Show\Field|Collection personal_name(string $label = null)
     * @method Show\Field|Collection total_Personal(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
