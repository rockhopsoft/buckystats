<!-- Stored in resources/views/vendor/buckystats/nodes/3120-all-graph-bullet-list.blade.php -->

<ul style="padding-left: 35px;">
@forelse ($dataTypes->typeGroups as $group)
    <li><b>{{ $group->title }}</b><div class="w100 pT10 pB30">
    @forelse ($group->types as $type)
        <table border="0" cellspacing="0" cellpadding="0" class="w100" ><tr>
        <td class="vaT" width="2%">
            <a href="/one/US/years?data={{ $type->slug }}"
                target="_blank" class="fL p10 mLn10 mR3 slGrey fPerc80"
                ><i class="fa fa-external-link" aria-hidden="true"></i></a>
        </td>
        <td class="vaT" width="98%">
            <a href="/one/US/years?data={{ $type->slug }}" class="fL p5">{{
                str_replace('Over Previous 5-Year Average ', ' ', $type->title)
            }}</a>
        </td>
        </tr></table>
    @empty
    @endforelse
    </div></li>
@empty
@endforelse
</ul>
