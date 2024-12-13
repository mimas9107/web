FROM node:20-alpine

EXPOSE 8080

RUN npm install -g @vue/cli

WORKDIR /home/node/vue_app/

USER node

CMD [ "npm", "run", "serve" ]
CMD [ "npm", "run", "build" ]
