<?php
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'category_id' => 1,
            'name' => 'Ethereum',
            'algorithm' => 'Scrypt',
            'country' => 'Rusia',
            'year' => 2015,
            'block_amount' => 6599855,
            'unit' => '[ether]',
            'maximum_value' => 1319.18,
            'description' => 'Ethereum es una plataforma open source, descentralizada que permite la creación de acuerdos de contratos inteligentes entre pares, basada en el modelo blockchain. Cualquier desarrollador puede crear y publicar aplicaciones distribuidas que realicen contratos inteligentes.',
            'video_id' => 'j23HnORQXvs',
            'image' => 'ethereum.png',
            'content_type_id' => 1
        ]);

        DB::table('contents')->insert([
            'category_id' => 1,
            'name' => 'Expanse',
            'algorithm' => 'Scrypt',
            'country' => 'USA',
            'year' => 2015,
            'block_amount' => 6599855,
            'unit' => '[exp]',
            'maximum_value' => 1319.18,
            'description' => 'Ethereum es una plataforma open source, descentralizada que permite la creación de acuerdos de contratos inteligentes entre pares, basada en el modelo blockchain. Cualquier desarrollador puede crear y publicar aplicaciones distribuidas que realicen contratos inteligentes.',
            'video_id' => 'xYbyC8qEbLo',
            'image' => 'expanse.png',
            'content_type_id' => 1
        ]);

        DB::table('contents')->insert([
            'category_id' => 1,
            'name' => 'Ethereum Classic',
            'algorithm' => 'Scrypt',
            'country' => 'Rusia',
            'year' => 2015,
            'block_amount' => 6599855,
            'unit' => '[ETC]',
            'maximum_value' => 4.5,
            'description' => 'Ethereum Classic es una plataforma informática distribuida, pública y de código abierto, basada en la cadena de bloques que ofrece una funcionalidad de contrato inteligente.',
            'video_id' => 'xYbyC8qEbLo',
            'image' => 'expanse.png',
            'content_type_id' => 1
        ]);

        DB::table('contents')->insert([
            'category_id' => 1,
            'name' => 'Monero',
            'algorithm' => 'Scrypt',
            'country' => 'USA',
            'year' => 2014,
            'block_amount' => 6599855,
            'unit' => '[Monero]',
            'maximum_value' => 4.5,
            'description' => 'Monero (XMR) es una criptomoneda de código abierto creada en abril de 2014, que prioriza la privacidad y la descentralización, y se ejecuta en Windows, macOS, Linux, Android y FreeBSD.2​ Monero usa un registro de transacciones público y las nuevas unidades se crean mediante un proceso llamado minado.',
            'video_id' => 'M3AHp9KgTkQ',
            'image' => 'monero.png',
            'content_type_id' => 1
        ]);


        DB::table('contents')->insert([
            'category_id' => 1,
            'name' => 'Zcash',
            'algorithm' => 'Scrypt',
            'country' => 'USA',
            'year' => 2016,
            'block_amount' => 6599855,
            'unit' => '[zcash]',
            'maximum_value' => 876.31,
            'description' => 'Zcash es una criptomoneda destinada a utilizar la criptografía para proporcionar un método más avanzado de privacidad a sus usuarios, en comparación con otras criptomonedas como Bitcoin.',
            'video_id' => '2FasPHC3VQg',
            'image' => 'zcash.png',
            'content_type_id' => 1
        ]);

        //HISTORIA DE CRIPTOMONEDAS
        DB::table('contents')->insert([
            'category_id' => 2,
            'name' => 'Bitcoin',
            'algorithm' => 'SHA 256',
            'country' => 'Desconocido',
            'year' => 2008,
            'block_amount' => 6599855,
            'unit' => '[BTC]',
            'maximum_value' => 19532.18,
            'description' => 'Bitcoin​ ​ es un protocolo y red P2P que se utiliza como criptomoneda, sistema de pago​ y mercancía.​​ Su unidad de cuenta nativa se denomina bitcóin.​ Esas unidades son las que sirven para contabilizar y transferir valor por lo que se clasifican como moneda digital.​',
            'video_id' => 'Gc2en3nHxA4',
            'image' => 'bitcoin.jpg',
            'content_type_id' => 1
        ]);

        DB::table('contents')->insert([
            'category_id' => 2,
            'name' => 'Satoshi Nakamoto',
            'description' => 'Satoshi Nakamoto es el nombre asignado a la persona o grupo de personas que crearon el protocolo Bitcoin y su software de referencia, Bitcoin Core. En 2008, Nakamoto publicó un artículo​​ en la lista de correo de criptografía metzdowd.com​ que describía un sistema P2P de dinero digital.',
            'image' => 'anon.png',
            'content_type_id' => 2
        ]);


        DB::table('contents')->insert([
            'category_id' => 3,
            'name' => 'URH Miner Desktop',
            'description' => 'La principal funcionalidad de URH-Miner es brindar a través de distintos los programas de código abierto (cgminer, cpuminer pooler, ethminer, YAM Miner y Genoil) la posibilidad de realizar el ejercicio de minería sobre monedas virtuales, las cuales se denominan “criptomonedas”. Las criptomonedas sonmonedas de carácter digital, no emitidas ni controladas por entidades bancarias, ni pertenecientes a ningún país determinado; que pueden ser usadas a nivel mundial y con las que se pueden adquirir bienes o servicios por medio de transacciones electrónicas.',
            'image' => 'urhdesktop.png',
            'content_type_id' => 2
        ]);


        DB::table('contents')->insert([
            'category_id' => 3,
            'name' => 'URH Miner Mobile',
            'description' => 'La principal funcionalidad de URH-Miner Mobile es poder verificar que no se produzca un inconveniente de conexión entre el equipo/rig y el pool en el que se está minando. Poder verificar que el pool en el que se mina no se encuentre caído. Poder verificar la tasa de hashrate a la que se encuentra trabajando el equipo/rig para saber que no está por debajo de los valores convencionales. Y como así también vas a poder visualizar las ultimas noticias sobre minería.',
            'image' => 'urhmobile.png',
            'content_type_id' => 2
        ]);
    }
}
