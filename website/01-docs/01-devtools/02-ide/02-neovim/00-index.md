---
layout: page
title: NeoVim for Java Development
description: NeoVim for Java Development
keywords: java, devtools, neovim, spring
permalink: /devtools/ide/neovim/
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

### Configure

<br/>

```
$ mkdir -p ~/.config/nvim/plugged
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim
call plug#begin('~/.config/nvim/plugged')

" LSP client and AutoInstaller
Plug 'neovim/nvim-lspconfig'
Plug 'williamboman/nvim-lsp-installer'
Plug 'mfussenegger/nvim-jdtls'

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
:LspInstall java
:LspInstallInfo
```

<br/>

```
path         ~/.local/share/nvim/lsp_servers/jdtls
```

<br/>

```
:TSInstall java
:TSInstallInfo
```

```
// lsp_servers logs
$ less ~/.cache/nvim/lsp.log
```

<br/>

### nvim-jdtls

```
$ cd ~/.local/share/nvim/lsp_servers/jdtls/plugins
$ ls org.eclipse.equinox.launcher_*
org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar
```

<br/>

**Need to specify:**

<br/>

```
'-jar', '/home/marley/.local/share/nvim/lsp_servers/jdtls/plugins/org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar',
'-configuration', '/home/marley/.local/share/nvim/lsp_servers/jdtls/config_linux',
'-data', '/home/marley/projects/dev/java'
```

<br/>

```
$ mkdir -p ~/.config/nvim/ftplugin/
$ vi ~/.config/nvim/ftplugin/java.lua
```

<br/>

```
-- See `:help vim.lsp.start_client` for an overview of the supported `config` options.
local config = {
  -- The command that starts the language server
  -- See: https://github.com/eclipse/eclipse.jdt.ls#running-from-the-command-line
  cmd = {

    -- 💀
    'java',
    '-Declipse.application=org.eclipse.jdt.ls.core.id1',
    '-Dosgi.bundles.defaultStartLevel=4',
    '-Declipse.product=org.eclipse.jdt.ls.core.product',
    '-Dlog.protocol=true',
    '-Dlog.level=ALL',
    '-Xms1g',
    '--add-modules=ALL-SYSTEM',
    '--add-opens', 'java.base/java.util=ALL-UNNAMED',
    '--add-opens', 'java.base/java.lang=ALL-UNNAMED',

    -- 💀
    '-jar', '/home/marley/.local/share/nvim/lsp_servers/jdtls/plugins/org.eclipse.equinox.launcher_org.eclipse.equinox.launcher_1.6.400.v20210924-0641.jar',
    '-configuration', '/home/marley/.local/share/nvim/lsp_servers/jdtls/config_linux',
    '-data', '/home/marley/projects/dev/java'
  },

  -- 💀
  -- This is the default if not provided, you can remove it. Or adjust as needed.
  -- One dedicated LSP server & client will be started per unique root_dir
  root_dir = require('jdtls.setup').find_root({'.git', 'mvnw', 'gradlew'}),

  -- Here you can configure eclipse.jdt.ls specific settings
  -- See https://github.com/eclipse/eclipse.jdt.ls/wiki/Running-the-JAVA-LS-server-from-the-command-line#initialize-request
  -- for a list of options
  settings = {
    java = {
    }
  }
}
-- This starts a new client & server,
-- or attaches to an existing client & server depending on the `root_dir`.
require('jdtls').start_or_attach(config)

```

<br/>

### [LSP](/devtools/ide/neovim/lsp/)

### [COC](/devtools/ide/neovim/coc/)

### [Spring Boot Development Using Command Line Only](/devtools/ide/neovim/example/)
