---
layout: page
title: NeoVim for Java Development
description: NeoVim for Java Development
keywords: java, devtools, neovim, spring
permalink: /devtools/ide/neovim/setup/
---

# NeoVim for Java Development

<br/>

### Setting up Neovim for Java Development

<br/>

### Install NeoVim

```
$ mkdir ~/apps && cd ~/apps
$ curl -LO https://github.com/neovim/neovim/releases/latest/download/nvim.appimage

$ sudo mkdir /opt/nvim

$ mv nvim.appimage nvim
$ chmod u+x nvim

$ sudo mv nvim /opt/nvim
```

<br/>

```
$ sudo vi /etc/profile.d/nvim.sh
```

<br/>

```
#### NeoVIM #######################

export NVIM_HOME=/opt/nvim
export PATH=${NVIM_HOME}/:$PATH

alias vi='nvim'
alias vim='nvim'
export EDITOR='nvim'

#### NeoVIM #######################
```

<br/>

```
$ sudo chmod +x /etc/profile.d/nvim.sh
$ source /etc/profile.d/nvim.sh
```

<br/>

```
// I also decided to add aliases in the bottom of file
$ sudo vi /etc/bash.bashrc
```

```
alias vi='nvim'
alias vim='nvim'
```

<br/>

```
$ vi --version
NVIM v0.5.1
```

<br/>

```
:help key-notation
```

<br/>

### Install package manager for neovim (Vim Plugins)

<br/>

```
$ curl -fLo ~/.config/nvim/autoload/plug.vim --create-dirs \
       https://raw.githubusercontent.com/junegunn/vim-plug/master/plug.vim
```

<br/>

### [LSP](/devtools/ide/neovim/lsp/)

### [COC](/devtools/ide/neovim/coc/)
