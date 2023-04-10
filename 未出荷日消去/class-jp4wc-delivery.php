<!-- 186行目forから198行目echo '</p>';を消去して以下を差し替える -->

for ($i = 0; $i <= $setting['reception-period']; $i++) {
    $set_display_date = $delivery_start_day->format('Y-m-d h:i:s');
    $value_date[$i] = get_date_from_gmt($set_display_date, 'Y-m-d');
    $display_date[$i] = get_date_from_gmt($set_display_date, __('Y/m/d', 'woocommerce-for-japan'));

    if ($setting['day-of-week']) {
        $week_name = $week[$delivery_start_day->format("w")];
        $display_date[$i] = $display_date[$i] . sprintf(__('(%s)', 'woocommerce-for-japan'), $week_name);
    }

    // 長期休み スタート 長期休みを配達指定日から除外
    if (
        ('2023-05-05' > $delivery_start_day->format('Y-m-d')) ||
        ('2023-05-10' < $delivery_start_day->format('Y-m-d'))
    ) {
        echo '<option value="' . $value_date[$i] . '">' . $display_date[$i] . '</option>';
    }

    $delivery_start_day->modify('+ 1 day');
}
echo '</select>';
echo '</p>';
