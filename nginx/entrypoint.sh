#!/bin/bash

# LOCAL_UIDがnullが未定義の場合は、1000を代入する。
# 1000はubuntu18.04のuidの最初の値。uidが1000であるための処理。
# 本来は、ログインuserのuidを動的に取得したいが、困難なので1000を設定している。
USER_ID=1000
GROUP_ID=1000

# ユーザー（uidが$USER_ID。usernameがuser）を登録する。またuserのホームディレクトリも作成する
useradd -u $USER_ID -o -m user
# userグループのgidを$GROUP_IDに変更する
groupmod -g $GROUP_ID user

# コンテナ内の/data以下の全てのファイルのownerをuserに変更する。（これでホスト側のuserの所有ファイルになる。）
# パーミッションの権限のようなもの
chown -R user:user /data
$sed 
# ---------------
# コンテナの起動を維持するための処理
# ---------------
# 以下の処理は、コンテナ内で無限ループを作り、コンテナの起動を維持するために書かれている。

# ログを吐き続けることで、deamonの起動を維持する
# tail -f /dev/null

exec /sbin/init
