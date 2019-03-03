<table>
    <tr>
        <td colspan=12><strong>Rekomendasi Komite Amoeba</strong></td>
    </tr>
    <tr>
        <td colspan=12>Sidang Komite Batch 7 - Penetapan Peserta Program (Loker Innovator)</td>
    </tr>
    <tr>
        <td colspan=12>Tanggal</td>
    </tr>
    <tr>
        <td></td>
        <td>Batch</td>
        <td>Nama Tim</td>
        <td>NIK</td>
        <td>Nama</td>
        <td>Loker</td>
        <td>Working Space</td>
        <td>C-Level</td>
        <td>Biz Score</td>
        <td>People Score</td>
        <td>Total Score</td>
        <td>Rekomendasi</td>
    </tr>
    <tbody>
    @foreach($amoebas as $index => $amoeba)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $amoeba->group->batch_id }}</td>
            <td>{{ $amoeba->group->name }}</td>
            <td>{{ $amoeba->NIK }}</td>
            <td>{{ $amoeba->user->name }}</td>
            <td>{{ $amoeba->loker }}</td>
            <td>{{ $amoeba->work_place}}</td>
            <td>{{ $amoeba->c_level }}</td>
            <td>{{ $amoeba->group->scores[0]->score }}</td>
            <td>{{ $amoeba->score }}</td>
            <td>{{ $amoeba->group->scores[0]->score * 30 /100 + $amoeba->score * 70/100 }}</td>
            <td>{{ $amoeba->criteria }}</td>
        </tr>
    @endforeach
    </tbody>
</table>