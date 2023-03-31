<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = User::create([
            'nik' => '60500014',
            'name' => 'YUDHA AGUS TRI BASUKI',
            'inisial' => 'YAT',
            'email' => 'yudha.tbasuki@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'MNF-YAT.jpeg',
            'signature' => 'MNF-YAT.png',
            'department_id' => 1
        ]);
        $user1->assignRole('mnf');

        $user2 = User::create([
            'nik' => '130100005',
            'name' => 'AMBAR KUSUMO NUGROHO',
            'inisial' => 'AKN',
            'email' => 'ambar.nugroho@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'PRD-AKN.jpeg',
            'signature' => 'PRD-AKN.png',
            'department_id' => 4
        ]);
        $user2->assignRole('depthead');
        $user2->assignRole('depthead pic');

        $user3 = User::create([
            'nik' => '230100009',
            'name' => 'FATCHUR RACHMAN',
            'inisial' => 'FRN',
            'email' => 'fathcur.rachman@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'QA-FRN.jpeg',
            'signature' => 'QA-FRN.jpg',
            'department_id' => 7
        ]);
        $user3->assignRole('depthead');
        $user3->assignRole('depthead pic');

        $user4 = User::create([
            'nik' => '110900055',
            'name' => 'HERMANSYAH',
            'inisial' => 'HCO',
            'email' => 'hermansyah.chaniago@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-HCO.jpeg',
            'signature' => 'IOS-HCO.png',
            'department_id' => 2
        ]);
        $user4->assignRole('depthead');
        $user4->assignRole('depthead pic');
        $user4->assignRole('mr & food safety team');

        $user5 = User::create([
            'nik' => '70400065',
            'name' => 'MARLENY PATANDUNG',
            'inisial' => 'MPG',
            'email' => 'marleny.patandung@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'WHS-MPG.jpeg',
            'signature' => 'WHS-MPG.png',
            'department_id' => 6
        ]);
        $user5->assignRole('depthead');
        $user5->assignRole('depthead pic');

        $user6 = User::create([
            'nik' => '100300009',
            'name' => 'NAZARUDIN RACHMAN SIDIK',
            'inisial' => 'NRS',
            'email' => 'nazarudin.rachman@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'MDP-NRS.jpeg',
            'signature' => 'MNF-NRS.png',
            'department_id' => 9
        ]);
        $user6->assignRole('depthead');
        $user6->assignRole('depthead pic');

        $user7 = User::create([
            'nik' => '50700014',
            'name' => 'DIDIK BUDIARTO',
            'inisial' => 'DBO',
            'email' => 'didik.budiarto@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'BDA-DBO.jpeg',
            'signature' => 'BDA-DBO.png',
            'department_id' => 3
        ]);
        $user7->assignRole('depthead');
        $user7->assignRole('depthead pic');

        $user8 = User::create([
            'nik' => '150600127',
            'name' => 'YOPPY SUKMANDAR',
            'inisial' => 'YSR',
            'email' => 'yoppy.sukmandar@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'ENG-YSR.jpeg',
            'signature' => 'ENG-YSR.png',
            'department_id' => 5
        ]);
        $user8->assignRole('depthead');
        $user8->assignRole('depthead pic');

        $user9 = User::create([
            'nik' => '180600122',
            'name' => 'BERNADHETA RISMISARI HANDAYANI',
            'inisial' => 'BRH',
            'email' => 'bernadheta.handayani@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'HC-BRH.jpeg',
            'signature' => 'HC-BRH.png',
            'department_id' => 8
        ]);
        $user9->assignRole('depthead');
        $user9->assignRole('depthead pic');

        $user10 = User::create([
            'nik' => '120200010',
            'name' => 'AGUNG JOKO SUPRIHANTO',
            'inisial' => 'AJS',
            'email' => 'agung.joko@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-AJS.jpeg',
            'signature' => 'IOS-ASH.png',
            'department_id' => 2
        ]);
        $user10->assignRole('svp system');

        $user11 = User::create([
            'nik' => '60700017',
            'name' => 'SRI REJEKI',
            'inisial' => 'SRI',
            'email' => 'sri.rezeki@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-SRI.jpeg',
            'signature' => 'IOS-SRI.png',
            'department_id' => 2
        ]);
        $user11->assignRole('svp system');

        $user12 = User::create([
            'nik' => '90593002',
            'name' => 'HALILY SOFYAN AL HASAN',
            'inisial' => 'HSN',
            'email' => 'halily.sofyan@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-HSN.jpeg',
            'signature' => 'IOS-HSN.png',
            'department_id' => 2
        ]);
        $user12->assignRole('pic');

        $user13 = User::create([
            'nik' => '130793036',
            'name' => 'ADNAN SAMSULEH',
            'inisial' => 'ASH',
            'email' => 'adnan.samsuleh@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-ASH.jpeg',
            'signature' => 'IOS-ASH.png',
            'department_id' => 2
        ]);
        $user13->assignRole('pic');

        $user14 = User::create([
            'nik' => '210100024',
            'name' => 'SARI DIYAH PALUPY',
            'inisial' => 'SDP',
            'email' => 'sari.palupy@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-SDP.jpeg',
            'signature' => 'IOS-SDP.png',
            'department_id' => 2
        ]);
        $user14->assignRole('admin');
        $user14->assignRole('document control');

        $user15 = User::create([
            'nik' => '120292515',
            'name' => 'RUDI SUGIARTO',
            'inisial' => 'RSO',
            'email' => 'rudi.sugiarto@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-RSO.jpeg',
            'signature' => 'IOS-RSO.jpg',
            'department_id' => 2
        ]);
        $user15->assignRole('pic');

        $user16 = User::create([
            'nik' => '70300036',
            'name' => 'JOJON DARSONO YOGA JAYA',
            'inisial' => 'JDY',
            'email' => 'jojon.darsono@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-JDY.jpeg',
            'signature' => 'WHS-JDY.png',
            'department_id' => 2
        ]);
        $user16->assignRole('pic');

        $user17 = User::create([
            'nik' => '61200043',
            'name' => 'YUNUS JOHN BILORO',
            'inisial' => 'YJB',
            'email' => 'yunus.biloro@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-YJB.jpeg',
            'signature' => 'IOS-YJB.jpg',
            'department_id' => 2
        ]);
        $user17->assignRole('pic');

        $user18 = User::create([
            'nik' => 'K210100003',
            'name' => 'DINA OKTAVIANI PUTRI',
            'inisial' => 'DOP',
            'email' => 'dina.oktaviani@kalbenutritionals.com',
            'password' => Hash::make('Kalbemorinaga'),
            'avatar' => 'IOS-DOP.jpeg',
            'signature' => 'IOS-DOP.jpg',
            'department_id' => 2
        ]);
        $user18->assignRole('pic');
    }
}
