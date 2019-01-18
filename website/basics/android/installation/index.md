---
layout: page
title: Prepare Ubuntu Linux Environment for Development Android Apps with Android Studio
permalink: /java_basics/android/installation/
---

### Enabling hardware acceleration for Android SDK emulator on Linux

I'm really don't know Hardware Acceleration works or not.

Ubuntu:

    $ sudo apt-get install -y qemu-kvm libvirt-bin ubuntu-vm-builder bridge-utils

    $ sudo adduser <user> libvirtd
    $ sudo adduser <user> kvm

Check if everything is ok:

    $ sudo virsh -c qemu:///system list

More information:  
http://blog.whitehorses.nl/2015/03/07/enabling-hardware-acceleration-for-android-sdk-emulator-on-linux/

### Android SDK installation

    $ cd /tmp/
    $ sudo mkdir -p /opt/android-sdk/

    $ wget http://dl.google.com/android/android-sdk_r24.2-linux.tgz

    $ tar -xvzf android-sdk_r24.2-linux.tgz
    $ cd android-sdk-linux/
    $ sudo mv * /opt/android-sdk/

I do some changes to store environment variables in .bash_profile (like as on RedHat Deistributives)

    $ vi ~/.bashrc

    ############################################################
    # To use .bash_profile file for env variables in ubuntu
    . ~/.bash_profile
    ############################################################

<br/>

    $ vi ~/.bash_profile

    #### ANDROID SDK #######################

        export ANDROID_HOME=/opt/android-sdk/
        export PATH=$PATH:$ANDROID_HOME/tools

    #### JAVA SDK #######################

<br/>

    $ source ~/.bash_profile

<br/>

    $ sudo chown -R <user> /opt/android-sdk/

<br/>

    $ android

I'm installing all packages for API 22

<div align="center">

    <img src="/files/android/installation/1.png" alt="Packages for API 22">

</div>

<br/>

To update packages execute next command

    $ android update sdk --no-ui

### Android Studio Installation

    $ cd /tmp/
    $ sudo mkdir -p /opt/android-studio/
    $ sudo chown -R <user> /opt/android-studio/

    $ wget https://dl.google.com/dl/android/studio/ide-zips/1.2.1.1/android-studio-ide-141.1903250-linux.zip

    $ unzip android-studio-ide-141.1903250-linux.zip

    $ cd android-studio/
    $ mv * /opt/android-studio/


    $ vi ~/.bash_profile

    #### ANDROID STUDIO #######################

        export ANDROID_STUDIO_HOME=/opt/android-studio/
        export PATH=$PATH:$ANDROID_STUDIO_HOME/bin

    #### ANDROID STUDIO #######################

<br/>

    $ source ~/.bash_profile

<br/>

To run android studio

    $ studio.sh

### Run Virtual Android Device

    $ android avd

<div align="center">

<img src="/files/android/installation/2.png" alt="How to run Android emulation on ubuntu linux">

<br/><br/>
Create AVD
<br/><br/>

<img src="/files/android/installation/3.png" alt="How to run Android emulation on ubuntu linux">

<br/><br/>
Use Host GPU is very important for hardware acceleration
<br/><br/>

<img src="/files/android/installation/4.png" alt="How to run Android emulation on ubuntu linux">

<br/><br/>

<img src="/files/android/installation/5.png" alt="How to run Android emulation on ubuntu linux">

<br/><br/>

<img src="/files/android/installation/6.png" alt="How to run Android emulation on ubuntu linux">

</div>

### Some commands (Yes, i love work in command line)

    $ android list avd
    Available Android Virtual Devices:
        Name: Nexus_5_by_Google
      Device: Nexus 5 (Google)
        Path: /home/marley/.android/avd/Nexus_5_by_Google.avd
      Target: Android 5.1.1 (API level 22)
     Tag/ABI: default/x86_64
        Skin: 1080x1920

<br/>

    $ emulator -avd Nexus_5_by_Google

With next paramters:

    $ emulator -avd Nexus_5_by_Google -scale 0.3 -gpu on -qemu -enable-kvm

I get next result (In the future i'm planning to start emulation with this parameters):

<div align="center">

<img src="/files/android/installation/7.png" alt="How to run Android emulation on ubuntu linux">

</div>

More Parameters:  
http://developer.android.com/tools/help/emulator.html

// To faster kill emu

    $ adb emu kill

// Get list devices

    $ adb devices
    List of devices attached
    R32D103PK8K	device
    emulator-5554	device

// Open command line on android device

    $ adb shell
    $ adb -s emulator-5554 shell

// Get file with database from virtual android device

    $ adb -s emulator-5554 pull /data/data/com.android.providers.contacts/databases/contacts2.db /data/contacts2.db

// Logs

    $ adb logcat
    $ adb -s emulator-5554 logcat

// sqlite3 databases on android devices:

    127|root@generic_x86_64:/ # ls -R /data/data/*/databases

    /data/data/com.android.deskclock/databases:
    alarms.db
    alarms.db-journal

    /data/data/com.android.email/databases:
    EmailProvider.db
    EmailProvider.db-journal
    EmailProviderBody.db
    EmailProviderBody.db-journal

    /data/data/com.android.inputmethod.latin/databases:
    pendingUpdates
    pendingUpdates-journal
    pendingUpdates.com.android.inputmethod.latin
    pendingUpdates.com.android.inputmethod.latin-journal

    /data/data/com.android.keychain/databases:
    grants.db
    grants.db-journal

    /data/data/com.android.launcher/databases:
    launcher.db
    launcher.db-journal

    /data/data/com.android.providers.calendar/databases:
    calendar.db
    calendar.db-journal

    /data/data/com.android.providers.contacts/databases:
    contacts2.db
    contacts2.db-journal
    profile.db
    profile.db-journal

    /data/data/com.android.providers.downloads/databases:
    downloads.db
    downloads.db-journal

    /data/data/com.android.providers.media/databases:
    external.db
    external.db-shm
    external.db-wal
    internal.db
    internal.db-shm
    internal.db-wal

    /data/data/com.android.providers.settings/databases:
    settings.db
    settings.db-journal

    /data/data/com.android.providers.telephony/databases:
    HbpcdLookup.db
    HbpcdLookup.db-journal
    mmssms.db
    mmssms.db-journal
    telephony.db
    telephony.db-journal

    /data/data/com.android.providers.userdictionary/databases:
    user_dict.db
    user_dict.db-journal

<br/>

    # qlite3 /data/data/com.android.providers.contacts/databases/contacts2.db

<br/>

    sqlite> .tables
    _sync_state               phone_lookup              view_data_usage_stat
    _sync_state_metadata      photo_files               view_entities
    accounts                  properties                view_groups
    agg_exceptions            raw_contacts              view_raw_contacts
    android_metadata          search_index              view_raw_entities
    calls                     search_index_content      view_stream_items
    contacts                  search_index_docsize      view_v1_contact_methods
    data                      search_index_segdir       view_v1_extensions
    data_usage_stat           search_index_segments     view_v1_group_membership
    default_directory         search_index_stat         view_v1_groups
    deleted_contacts          settings                  view_v1_organizations
    directories               status_updates            view_v1_people
    groups                    stream_item_photos        view_v1_phones
    mimetypes                 stream_items              view_v1_photos
    name_lookup               v1_settings               visible_contacts
    nickname_lookup           view_contacts             voicemail_status
    packages                  view_data
