---
layout: page
title: NeoVim for Java Development
description: NeoVim for Java Development
keywords: java, devtools, neovim, spring
permalink: /devtools/ide/neovim/
---

# NeoVim for Java Development

<br/>

https://github.com/neovim/nvim-lspconfig

https://github.com/mfussenegger/nvim-jdtls

https://github.com/williamboman/nvim-lsp-installer

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

### Current Config

```
$ vi ~/.config/nvim/init.vim
```

<br/>

```vim
set colorcolumn=80


" """"""""""""""""""""""""""""""""""""""""

call plug#begin('~/.config/nvim/plugged')

" LSP client and AutoInstaller
Plug 'neovim/nvim-lspconfig'
Plug 'williamboman/nvim-lsp-installer'
Plug 'mfussenegger/nvim-jdtls'

" Treesitter
Plug 'nvim-treesitter/nvim-treesitter'

call plug#end()


" """"""""""""""""""""""""""""""""""""""""""""

" exit on jk from i
inoremap jk <esc>

" turn off search highlight
nnoremap ,<space> :nohlsearch<CR>

map gn :bn<cr>
map gp :bp<cr>
map gw :Bclose<cr>

```

<br/>

### Spring Boot Development Using Command Line Only

https://www.youtube.com/watch?v=zmnlpf4FtkE

https://www.developersoapbox.com/command-line-only-spring-boot-development-using-vim/

https://www.developersoapbox.com/creating-a-rest-api-effortlessly-with-spring-rest-repositories/

<br/>

```
$ sudo apt install vim tmux curl unzip openjdk-11-jdk
```

<br/>

```
$ mkdir -p ~/projects/dev/java && cd ~/projects/dev/java
$ curl https://start.spring.io/starter.zip -d dependencies=h2,data-jpa,data-rest -d javaVersion=11 -o demo.zip

$ unzip demo.zip
```

<br/>

```
$ ./mvnw spring-boot:run
```

<br/>

```
$ vi src/main/java/com/example/demo/Beer.java
```

<!--

<br/>

```java
package com.example.demo;

import javax.annotation.Generated;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.GenerationType;
import lombok.Data;

@Data
@Entity
public class Beer {
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private Long id;
    private String name;
    private Double abv;
}
``` -->

<br/>

```java
package com.example.demo;

import javax.annotation.Generated;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.GenerationType;

@Entity
public class Beer {

    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private Long id;
    private String name;
    private Double abv;

    public Beer() {
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Double getAbv() {
        return abv;
    }

    public void setAbv(Double abv) {
        this.abv = abv;
    }
}
```

<br/>

```
$ vi src/main/java/com/example/demo/RestRepository.java
```

<br/>

```java
package com.example.demo;

import org.springframework.data.repository.CrudRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

@RepositoryRestResource
public interface RestRepository extends CrudRepository<Beer, Long>{}
```

<br/>

```
$ mkdir -p src/main/resources/
$ vi src/main/resources/application.properties
```

<br/>

```java
spring.datasource.url=jdbc:h2:mem:test
spring.jpa.hibernate.ddl-auto=create-drop
spring.datasource.driverClassName=org.h2.Driver
spring.jpa.database-platform=org.hibernate.dialect.H2Dialect
spring.jpa.show-sql=true
```

<br/>

<!-- ```
$ vi src/main/resources/data.sql
```

<br/>

```java
INSERT INTO beer(name,abv) VALUES('Jai Alai', 7.5);
INSERT INTO beer(name,abv) VALUES('Stella Artois', 5.0);
INSERT INTO beer(name,abv) VALUES('Lagunitas IPA', 6.2);
COMMIT;
``` -->

<br/>

```
$ ./mvnw spring-boot:run
```

<br/>

```
$ curl http://localhost:8080/beers

$ curl -X POST -H "Content-Type:application/json" -d '{"name": "Jai Alai", "abv": 7.5}' http://localhost:8080/beers

$ curl http://localhost:8080/beers/1
```

<br/>

OK!

<br/>

### Materials with COC:

https://www.youtube.com/watch?v=8q_VPqA-KLs

https://www.chrisatmachine.com/Neovim/24-neovim-and-java/

<br/>

https://www.youtube.com/watch?v=OXEVhnY621M

https://www.chrisatmachine.com/Neovim/04-vim-coc/

<br/>

https://github.com/neoclide/coc.nvim/wiki/Using-coc-extensions
