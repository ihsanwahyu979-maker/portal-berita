<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <p>Halo {{ $submission->author_name }},</p>
    
    <p>Terima kasih telah berkontribusi mengirimkan berita berjudul <strong>"{{ $submission->title }}"</strong> ke Portal Berita.</p>
    
    @if($status == 'approved')
        <div style="background-color: #e8f5e9; padding: 15px; border-left: 4px solid #4caf50; margin: 20px 0;">
            <strong>Selamat!</strong> Berita yang Anda kirimkan telah disetujui oleh tim redaksi kami dan sekarang sudah diterbitkan di portal kami.
        </div>
        <p>Anda dapat melihatnya langsung di website kami. Teruslah berkarya dan membagikan informasi bermanfaat untuk semua!</p>
    @else
        <div style="background-color: #ffebee; padding: 15px; border-left: 4px solid #f44336; margin: 20px 0;">
            <strong>Mohon Maaf,</strong> berita yang Anda kirimkan belum dapat kami terbitkan saat ini.
        </div>
        <p>Hal ini mungkin karena berita tersebut belum memenuhi standar redaksional kami, atau sudah ada berita serupa yang terbit lebih dulu. Jangan patah semangat, kami tunggu kiriman berita Anda selanjutnya!</p>
    @endif
    
    <br>
    <p>Salam hangat,<br>
    <strong>Tim Redaksi Portal Berita</strong></p>
</body>
</html>
