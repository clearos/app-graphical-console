
Name: app-graphical-console
Epoch: 1
Version: 2.4.2
Release: 1%{dist}
Summary: Graphical Console
License: GPLv3
Group: ClearOS/Apps
Source: %{name}-%{version}.tar.gz
Buildarch: noarch
Requires: %{name}-core = 1:%{version}-%{release}
Requires: app-base
Requires: app-network

%description
The Graphical Console allows administrators to configure basic settings in a user-friendly graphical environment

%package core
Summary: Graphical Console - Core
License: LGPLv3
Group: ClearOS/Libraries
Requires: app-base-core
Requires: clearos-console >= 7.4.0
Requires: dbus-x11
Requires: gconsole
Requires: ratpoison
Requires: urw-fonts
Requires: xorg-x11-drivers
Requires: xorg-x11-server-Xorg
Requires: xorg-x11-xinit
Requires: google-noto-kufi-arabic-fonts
Requires: google-noto-sans-armenian-fonts
Requires: google-noto-sans-bengali-fonts
Requires: google-noto-sans-bengali-ui-fonts
Requires: google-noto-sans-devanagari-fonts
Requires: google-noto-sans-devanagari-ui-fonts
Requires: google-noto-sans-georgian-fonts
Requires: google-noto-sans-gujarati-fonts
Requires: google-noto-sans-gujarati-ui-fonts
Requires: google-noto-sans-gurmukhi-fonts
Requires: google-noto-sans-gurmukhi-ui-fonts
Requires: google-noto-sans-hebrew-fonts
Requires: google-noto-sans-kannada-fonts
Requires: google-noto-sans-kannada-ui-fonts
Requires: google-noto-sans-khmer-fonts
Requires: google-noto-sans-khmer-ui-fonts
Requires: google-noto-sans-korean-fonts
Requires: google-noto-sans-lao-fonts
Requires: google-noto-sans-lao-ui-fonts
Requires: google-noto-sans-malayalam-fonts
Requires: google-noto-sans-malayalam-ui-fonts
Requires: google-noto-sans-myanmar-fonts
Requires: google-noto-sans-myanmar-ui-fonts
Requires: google-noto-sans-simplified-chinese-fonts
Requires: google-noto-sans-sinhala-fonts
Requires: google-noto-sans-tamil-fonts
Requires: google-noto-sans-tamil-ui-fonts
Requires: google-noto-sans-telugu-fonts
Requires: google-noto-sans-telugu-ui-fonts
Requires: google-noto-sans-thai-fonts
Requires: google-noto-sans-thai-ui-fonts
Requires: google-noto-serif-armenian-fonts
Requires: google-noto-serif-georgian-fonts
Requires: google-noto-serif-khmer-fonts
Requires: google-noto-serif-lao-fonts
Requires: google-noto-serif-thai-fonts
Requires: google-noto-serif-fonts

%description core
The Graphical Console allows administrators to configure basic settings in a user-friendly graphical environment

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/graphical_console
cp -r * %{buildroot}/usr/clearos/apps/graphical_console/

install -D -m 0644 packaging/Xdefaults %{buildroot}/var/lib/clearconsole/.Xdefaults
install -D -m 0644 packaging/graphical_console %{buildroot}/var/clearos/base/access_control/public/graphical_console
install -D -m 0644 packaging/hushlogin %{buildroot}/var/lib/clearconsole/.hushlogin
install -D -m 0644 packaging/xinitrc %{buildroot}/var/lib/clearconsole/.xinitrc

%post
logger -p local6.notice -t installer 'app-graphical-console - installing'

%post core
logger -p local6.notice -t installer 'app-graphical-console-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/graphical_console/deploy/install ] && /usr/clearos/apps/graphical_console/deploy/install
fi

[ -x /usr/clearos/apps/graphical_console/deploy/upgrade ] && /usr/clearos/apps/graphical_console/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-graphical-console - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-graphical-console-core - uninstalling'
    [ -x /usr/clearos/apps/graphical_console/deploy/uninstall ] && /usr/clearos/apps/graphical_console/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/graphical_console/controllers
/usr/clearos/apps/graphical_console/htdocs
/usr/clearos/apps/graphical_console/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/graphical_console/packaging
%exclude /usr/clearos/apps/graphical_console/unify.json
%dir /usr/clearos/apps/graphical_console
/usr/clearos/apps/graphical_console/deploy
/usr/clearos/apps/graphical_console/language
/usr/clearos/apps/graphical_console/libraries
/var/lib/clearconsole/.Xdefaults
/var/clearos/base/access_control/public/graphical_console
/var/lib/clearconsole/.hushlogin
/var/lib/clearconsole/.xinitrc
