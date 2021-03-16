<!-- Stored in resources/views/vendor/buckystats/nodes/3120-all-custom-reports-bullet-list.blade.php -->

<ul style="padding-left: 35px;">
@forelse ($groups as $groupName => $group)
    <li><b>{{ $groupName }}</b><div class="w100 pT10 pB30">
    @forelse ($group as $report)
        <table border="0" cellspacing="0" cellpadding="0" class="w100" ><tr>
        <td class="vaT" width="2%">
            <a href="{{ $report[1] }}"
                target="_blank" class="fL p10 mLn10 mR3 slGrey fPerc80"
                ><i class="fa fa-external-link" aria-hidden="true"></i></a>
        </td>
        <td class="vaT" width="98%">
            <a href="{{ $report[1] }}" class="fL p5">{{ $report[0] }}</a>
        </td>
        </tr></table>
    @empty
    @endforelse
    </div></li>
@empty
@endforelse
</ul>
