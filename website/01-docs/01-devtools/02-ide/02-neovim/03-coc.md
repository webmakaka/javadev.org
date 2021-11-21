---
layout: page
title: NeoVim for Java Development
description: NeoVim for Java Development
keywords: java, devtools, neovim, coc, spring
permalink: /devtools/ide/neovim/coc/
---

# NeoVim for Java Development (COC)

<br/>

```
$ mkdir ~/.config/nvim/plug-config
$ vi ~/.config/nvim/plug-config/coc.vim
```

<br/>

**copy Example vim configuration**  
https://github.com/neoclide/coc.nvim

<br/>

```
$ mkdir -p ~/.config/nvim/plugged
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim

source $HOME/.config/nvim/plug-config/coc.vim

call plug#begin('~/.config/nvim/plugged')

" Stable version of coc
Plug 'neoclide/coc.nvim', {'branch': 'release'}

" Keeping up to date with master
Plug 'neoclide/coc.nvim', {'do': 'yarn install --frozen-lockfile'}

" Treesitter
Plug 'nvim-treesitter/nvim-treesitter'

call plug#end()
```

<br/>

```
:PlugInstall
```

<br/>

```
:TSInstall java
:TSInstallInfo
```

<br/>

**coc-java**

<br/>

```
:CocInstall coc-java
```

<br/>

**Lombok**

<br/>

```
$ sudo mkdir /usr/local/share/lombok

$ sudo wget https://projectlombok.org/downloads/lombok.jar -O /usr/local/share/lombok/lombok.jar
```

<br/>

### coc-settings.json:

**configuration-options**  
https://github.com/neoclide/coc-tsserver#configuration-options

<br/>

    $ vi ~/.config/nvim/coc-settings.json

<br/>

```json
"codeLens.enable": true,
"java.referencesCodeLens.enabled": true,
"java.jdt.ls.vmargs": "-javaagent:/usr/local/share/lombok/lombok.jar"
```

<br/>

### [Spring Boot Development Using Command Line Only](/devtools/ide/neovim/example/)

<br/>

### Materials with COC:

https://www.youtube.com/watch?v=8q_VPqA-KLs

https://www.chrisatmachine.com/Neovim/24-neovim-and-java/

<br/>

https://www.youtube.com/watch?v=OXEVhnY621M

https://www.chrisatmachine.com/Neovim/04-vim-coc/

<br/>

https://github.com/neoclide/coc.nvim/wiki/Using-coc-extensions
